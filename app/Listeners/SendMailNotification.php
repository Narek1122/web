<?php

namespace App\Listeners;

use App\Events\MailProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Log;
use App\Mail\SendMailNotifications;

class SendMailNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\MailProcessed  $event
     * @return void
     */
    public function handle(MailProcessed $event)
    {
        \Mail::to($event->userData['email'])->send(
            new SendMailNotifications($event->userData)
        );


    }
}
