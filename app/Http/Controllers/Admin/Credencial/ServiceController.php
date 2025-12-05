<?php

namespace App\Http\Controllers\Admin\Credencial;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceQrCode;
use PDF;

class ServiceController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }


    public function print($id)
    {
        $service = Service::with('qrcodes')->findOrFail($id);

        // Impede geração se já estiver emitido
        if ($service->status !== 'EMITIDO') {
            $quantity = $service->quantity;
            $createdCodes = [];

            for ($i = 0; $i < $quantity; $i++) {
                do {
                    // Gera código único de 6 dígitos
                    $code = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
                } while (ServiceQrCode::where('code', $code)->exists());

                $qrCode = $service->qrcodes()->create([
                    'code' => $code,
                    'service_id' => $id
                ]);

                $createdCodes[] = $qrCode->code;
            }

            // Atualiza status e data de impressão
            $service->update([
                'status' => 'EMITIDO',
                'printed_at' => now(),
            ]);
        }

        // Estilo visual
        $styleMap = [
            'STARTUP' => ['background' => '#5F61D8', 'color' => '#FFFFFF'],
            'IMPRENSA' => ['background' => '#007CB5', 'color' => '#FFF'],
            'SEGURANÇA' => ['background' => '#F49601', 'color' => '#343A40'],
            'PROTOCOLO' => ['background' => '#1E3361', 'color' => '#FFFFFF'],
            'APOIO TÉCNICO' => ['background' => '#1E3361', 'color' => '#FFFFFF'],
            'SERVIÇO' => ['background' => '#1E3361', 'color' => '#FFFFFF'],
            'ORGANIZAÇÃO' => ['background' => '#C11521', 'color' => '#FFFFFF'],
            'RESTAURAÇÃO' => ['background' => '#4C1864', 'color' => '#FFFFFF'],
            'ESCOLTA' => ['background' => '#F49601', 'color' => '#343A40'],
            'MOTORISTA' => ['background' => '#F49601', 'color' => '#343A40'],
            'APOIO AO EMPREENDEDOR' => ['background' => '#4C1864', 'color' => '#FFFFFF'],
            'CENTRO DE INVESTIMENTO' => ['background' => '#4C1864', 'color' => '#FFFFFF'],
            'PALCO 360º' => ['background' => '#4C1864', 'color' => '#FFFFFF'],
            'HACKATHON' => ['background' => '#4C1864', 'color' => '#FFFFFF'],
        ];

        $style = $styleMap[$service->type] ?? ['background' => '#000000', 'color' => '#FFFFFF'];

        $data = [
            'service' => $service,
            'background' => $style['background'],
            'color' => $style['color'],
        ];

        $pdf = PDF::loadView('pdf.credencial.service.index', $data);
        $pdf->setPaper('A6', 'portrait');

        // Logger
        $this->Logger->log('emergency', 'Imprimiu uma credencial de serviço com o identificador: ' . $id);

        return $pdf->stream('credenciamento-' . $id . '.pdf');
    }
}
