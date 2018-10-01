<?php

namespace App\Listeners;

use App\Events\ScreenConnected;
use App\Events\SendActiveContentsList;

class RetrieveActiveContentList
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
     * @param  ScreenConnected  $event
     * @return void
     */
    public function handle(ScreenConnected $event)
    {
        $screen = $event->screen;
        $contents = $event->screen->activeContents;

        event(new SendActiveContentsList($screen, $contents));
    }
}
