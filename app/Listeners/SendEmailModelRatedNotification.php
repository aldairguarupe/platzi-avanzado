<?php

namespace App\Listeners;

use App\Events\ModelRated;
use App\Models\Product;
use App\Notifications\ModelRatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailModelRatedNotification
{
    public function __construct()
    {
        //
    }

    public function handle(ModelRated $event): void
    {
        /** @var \App\Models\Product $rateable */
        $rateable = $event->getRateable();
        if ($rateable instanceof Product) {
            $notification = new ModelRatedNotification(
                $event->qualifier->name,
                $rateable->name,
                $event->score);
            $rateable->createdBy->notify($notification);
        }
    }
}
