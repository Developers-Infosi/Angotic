<?php

namespace App\Http\Controllers\Admin\Credencial;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Speaker;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;

class SpeakerController extends Controller
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

        $response['speaker'] = Speaker::findOrFail($id);

        // Só atualiza se ainda não tiver um qrcode
        if (empty($response['speaker']->qrcode)) {
            do {
                // Gera código aleatório de 4 dígitos com zeros à esquerda
                $code = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
            } while (Speaker::where('qrcode', $code)->exists()); // Garante unicidade

            // Atualiza o campo qrcode
            $response['speaker']->update([
                'qrcode' => $code,
            ]);
        }



        $pdf = PDF::loadView('pdf.credencial.speaker.index', $response);
        $pdf->setPaper('A6', 'portrait');

        //Logger
        $this->Logger->log('emergency', 'Imprimiu uma credencial com o identificador: ' . $response['speaker']->qrcode);

        return $pdf->stream('credenciamento-' . $response['speaker']->qrcode . ".pdf");
    }
}
