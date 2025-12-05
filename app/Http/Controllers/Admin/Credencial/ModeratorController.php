<?php

namespace App\Http\Controllers\Admin\Credencial;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Moderator;
use App\Models\Schedule;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;

class ModeratorController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }


   

      /**
     * Print the Certified
     *
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {

        $response['moderator'] = Moderator::findOrFail($id);

        // Só atualiza se ainda não tiver um qrcode
        if (empty($response['moderator']->qrcode)) {
            do {
                // Gera código aleatório de 5 dígitos com zeros à esquerda
                $code = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);
            } while (Moderator::where('qrcode', $code)->exists()); // Garante unicidade

            // Atualiza o campo qrcode
            $response['moderator']->update([
                'qrcode' => $code,
            ]);
        }


        $pdf = PDF::loadView('pdf.credencial.moderator.index', $response);
        $pdf->setPaper('A6', 'portrait');

        //Logger
        $this->Logger->log('emergency', 'Imprimiu uma credencial com o identificador: ' . $response['moderator']->qrcode);

        return $pdf->stream('credenciamento-' . $response['moderator']->qrcode . ".pdf");
    }


  
}
