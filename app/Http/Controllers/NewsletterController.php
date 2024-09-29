<?php

namespace App\Http\Controllers;

use App\Console\Commands\SendEmailverficationCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class NewsletterController extends Controller
{
    public function send()
    {
        Artisan::call(SendEmailverficationCommand::class);
        return response()->json(['data' => 'Todo bien!']);
    }
}
