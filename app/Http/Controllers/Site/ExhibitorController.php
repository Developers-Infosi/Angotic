<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Jobs\ExhibitorJob;
use App\Models\Exhibitor;
use Illuminate\Http\Request;
use PDF;

class ExhibitorController extends Controller
{

    public function index()
    {
        return view('site.exhibitor.index');
    }

    public function store(Request $request)
    {

        $request->validate([
            'plafond' => 'required|string|max:255',
            'nif' => 'required|unique:exhibitors,nif|string|max:255',
            'company' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'nullable|string|max:255',
            'lineBusiness' => 'required|string|max:255',
            'Website' => 'nullable|string|max:255',
            'logo' => 'required|mimes:png,jpeg,jpg,svg',
            'typeExhibitor' => 'required|string|max:255',
        ]);


        $file = $request->file('logo')->store('exhibitors');

        $key = 'ANGOTICPTR' . "-" . rand() . "-" . date('y');

        $exhibitor = Exhibitor::create([
            'plafond' => $request->plafond,
            'nif' => $request->nif,
            'company' => $request->company,
            'phone' => $request->phone,
            'email' => $request->email,
            'logo' =>  $file,
            'code' =>  $key,
            'typeExhibitor' => $request->typeExhibitor,
            'lineBusiness' => $request->lineBusiness,
            'Website' => $request->Website,


        ]);




        /**STARTUP */
        if ($exhibitor->typeExhibitor == "STARTUP") {
            $response['amount'] = "30.000,00 KZ";
        }
        /** END STARTUP-*/

        /** PATROCINADOR NÃO EXPOSITOR */
        if ($exhibitor->typeExhibitor == "PATROCINADOR NÃO EXPOSITOR") {

            if ($exhibitor->plafond == "COFFEBREAK") {
                $response['amount'] = "1.500.000,00 KZ";
            }

            if ($exhibitor->plafond == "ALMOCO") {
                $response['amount'] = "2.500.000,00 KZ";
            }

            if ($exhibitor->plafond == "SILVER") {
                $response['amount'] = "15.000.000,00 KZ";
            }

            if ($exhibitor->plafond == "GOLD") {
                $response['amount'] = "25.000.000,00 KZ";
            }

            if ($exhibitor->plafond == "PLATINUM") {
                $response['amount'] = " 40.000.000,00 KZ";
            }
        }
        /**END PATROCINADOR NÃO EXPOSITOR */

        /**PATROCINADOR EXPOSITOR */

        if ($exhibitor->typeExhibitor == "PATROCINADOR EXPOSITOR") {

            if ($exhibitor->plafond == "OFICIAL") {
                $response['amount'] = '80000000';
            }

            if ($exhibitor->plafond == "HALL PRINCIPAL") {
                $response['amount'] = '10800000';
            }

            if ($exhibitor->plafond == "ZONA A - STAND CATEGORIA (A)") {
                $response['amount'] = '15000000';
            }

            if ($exhibitor->plafond == "ZONA A - STAND CATEGORIA (B)") {
                $response['amount'] = '10800000';
            }

            if ($exhibitor->plafond == "ZONA A - STAND CATEGORIA (C)") {
                $response['amount'] = '5400000';
            }

            if ($exhibitor->plafond == "ZONA A - STAND CATEGORIA (D)") {
                $response['amount'] = '2700000';
            }


            if ($exhibitor->plafond == "ZONA B - STAND CATEGORIA (A)") {
                $response['amount'] = '14400000';
            }
            if ($exhibitor->plafond == "ZONA B - STAND CATEGORIA (B)") {
                $response['amount'] = '10000000';
            }
            if ($exhibitor->plafond == "ZONA B - STAND CATEGORIA (C)") {
                $response['amount'] = '7200000';
            }
            if ($exhibitor->plafond == "ZONA B - STAND CATEGORIA (D)") {
                $response['amount'] = '3600000';
            }
            if ($exhibitor->plafond == "ZONA B - STAND CATEGORIA (E)") {
                $response['amount'] = '1800000';
            }


            if ($exhibitor->plafond == "ZONA C - STAND CATEGORIA (A)") {
                $response['amount'] = '360000';
            }
            if ($exhibitor->plafond == "ZONA C - STAND CATEGORIA (B)") {
                $response['amount'] = '270000';
            }
            if ($exhibitor->plafond == "ZONA C - STAND CATEGORIA (C)") {
                $response['amount'] = '180000';
            }
        }
        /** END PATROCINADOR EXPOSITOR-*/


        $exhibitor = Exhibitor::find($exhibitor->id);
        ExhibitorJob::dispatch($exhibitor)->delay(now()->addSeconds('2'));
        return redirect()->back()->with('create', ['codetype' => $exhibitor->code, 'niftype' => $exhibitor->nif]);
    }

    /**
     * Display a invoice with certified QrScan
     *
     * @return \Illuminate\Http\Response
     */
    public function invoice($nif, $code)
    {
        $response['registration'] = Exhibitor::where([['code', $code], ['nif', $nif]])->first();



        //STARTUP
        if ($response['registration']->plafond == "STARTUP") {
            $response['amount'] = '30000';
        }


        //PATROCINADOR NÃO EXPOSITOR
        if ($response['registration']->typeExhibitor == "PATROCINADOR NÃO EXPOSITOR") {

            if ($response['registration']->plafond == "COFFEBREAK") {
                $response['amount'] = '1500000';
            } elseif ($response['registration']->plafond == "ALMOCO") {
                $response['amount'] = '2500000';
            } elseif ($response['registration']->plafond == "SILVER") {
                $response['amount'] = '15000000';
            } elseif ($response['registration']->plafond == "GOLD") {
                $response['amount'] = '25000000';
            } elseif ($response['registration']->plafond == "PLATINUM") {
                $response['amount'] = '40000000';
            }
        }

        //PATROCINADOR EXPOSITOR
        if ($response['registration']->typeExhibitor == "PATROCINADOR EXPOSITOR") {




            if ($response['registration']->plafond == "OFICIAL") {
                $response['amount'] = '80000000';
            }

            if ($response['registration']->plafond == "HALL PRINCIPAL") {
                $response['amount'] = '10800000';
            }

            if ($response['registration']->plafond == "ZONA A - STAND CATEGORIA (A)") {
                $response['amount'] = '15000000';
            }

            if ($response['registration']->plafond == "ZONA A - STAND CATEGORIA (B)") {
                $response['amount'] = '10800000';
            }

            if ($response['registration']->plafond == "ZONA A - STAND CATEGORIA (C)") {
                $response['amount'] = '5400000';
            }

            if ($response['registration']->plafond == "ZONA A - STAND CATEGORIA (D)") {
                $response['amount'] = '2700000';
            }


            if ($response['registration']->plafond == "ZONA B - STAND CATEGORIA (A)") {
                $response['amount'] = '14400000';
            }
            if ($response['registration']->plafond == "ZONA B - STAND CATEGORIA (B)") {
                $response['amount'] = '10000000';
            }
            if ($response['registration']->plafond == "ZONA B - STAND CATEGORIA (C)") {
                $response['amount'] = '7200000';
            }
            if ($response['registration']->plafond == "ZONA B - STAND CATEGORIA (D)") {
                $response['amount'] = '3600000';
            }
            if ($response['registration']->plafond == "ZONA B - STAND CATEGORIA (E)") {
                $response['amount'] = '1800000';
            }


            if ($response['registration']->plafond == "ZONA C - CATEGORIA (A)") {
                $response['amount'] = '360000';
            }
            if ($response['registration']->plafond == "ZONA C - CATEGORIA (B)") {
                $response['amount'] = '270000';
            }
            if ($response['registration']->plafond == "ZONA C - CATEGORIA (C)") {
                $response['amount'] = '180000';
            }
        }


        $pdf = PDF::loadView('pdf/invoice/exhibitor/index', $response);
        return $pdf->stream('Documento de Pagamento  -' . date('d-m-y') . '.pdf');
    }
}
