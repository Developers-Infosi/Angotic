<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\EventAlertMail;
use App\Models\Registration;

class EventCountdownAlert implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $daysLeft;

    public function __construct(int $daysLeft)
    {
        $this->daysLeft = $daysLeft;
    }

    public function handle()
    {
        $eventDate = Carbon::create(2025, 10, 28);
        $today = Carbon::now();
        $daysRemaining = $eventDate->diffInDays($today, false);

        if ($daysRemaining !== $this->daysLeft) return;

        Registration::whereNotNull('email')
            ->where('email', '!=', '')
            ->chunk(200, function ($registrations) {
                foreach ($registrations as $registration) {
                    try {
                        Mail::to($registration->email)->queue(new EventAlertMail($this->daysLeft));
                    } catch (\Exception $e) {
                        \Log::error("Erro enviando email para {$registration->email}: {$e->getMessage()}");
                    }
                }
            });
    }
}
