<?php

namespace App\Jobs;

use App\Mail\WelcomeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public readonly string $userEmail)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $mail = new WelcomeMail();
        Mail::to($this->userEmail)->send($mail);
    }
}
