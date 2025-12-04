<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoggerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $log;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($log)
    {
        $this->log = $log;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Actividade Efetuada no Portal do Fórum de Governança
        da Internet em Angola  - '. date('d/m/Y'))
        ->view('mail.log.index');
    }
}
