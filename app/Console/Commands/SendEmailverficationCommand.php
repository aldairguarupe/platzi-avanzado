<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmailverficationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:emailverfication';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//        dd("Email Verificado");
        return true;
    }
}
