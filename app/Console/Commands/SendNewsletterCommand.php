<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\NewsletterNotification;
use Illuminate\Console\Command;

class SendNewsletterCommand extends Command
{
    protected $signature = 'send:newsletter {emails?*}';
    protected $description = 'Envía un correo electrónico';

    public function handle()
    {
        $emails = $this->argument('emails');
        $builder = User::query();

        if ($emails) {
            $builder->whereIn('emails', $emails);
        }

        $count = $builder->count();

        if ($count) {
            $this->output->progressStart($count);
            $builder->whereNotNull('email_verified_at')
                ->each(function (User $user) {
                    $user->notify(new NewsletterNotification());
                    $this->output->progressAdvance();
                });
            $this->info("Se enviaron {$count} correos");
            $this->output->progressFinish();
        } else {
            $this->info("No se envió ningún correo");
        }
    }
}
