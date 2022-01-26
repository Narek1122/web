<?php

namespace App\Providers;

use App\Providers\SendMailNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MailProcessed
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
     * @param  \App\Providers\SendMailNotification  $event
     * @return void
     */
    public function handle(SendMailNotification $event)
    {
        //
    }
}
