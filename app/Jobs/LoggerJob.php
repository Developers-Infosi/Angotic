<?php

namespace App\Jobs;

use App\Mail\LoggerMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class LoggerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $tries = 3;
    private $log;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($log)
    {
        $this->log = $log;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

       $data = new LoggerMail($this->log);
       Mail::to('comercial@fgi.ao')
       ->send($data);
    }
}
