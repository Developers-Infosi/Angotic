<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventAlertMail extends Mailable
{
    use Queueable, SerializesModels;

    public $daysLeft;

    public function __construct(int $daysLeft)
    {
        $this->daysLeft = $daysLeft;
    }

    public function build()
    {
        $subject = $this->daysLeft === 0
            ? 'Chegou O DIA! III Luanda Financing Summit'
            : "Faltam {$this->daysLeft} dias para o III Luanda Financing Summit";

        return $this->subject($subject)
                    ->markdown('emails.event_alert')
                    ->with(['daysLeft' => $this->daysLeft]);
    }
}
