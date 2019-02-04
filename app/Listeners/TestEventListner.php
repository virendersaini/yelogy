<?php

namespace App\Listeners;

use App\Events\TestEventFired;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestEventListner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  TestEventFired  $event
     * @return void
     */
    public function handle($event)
    {
        \Log::info('$event', [get_class($event)]);
        \Log::info('event_data', $event->data);
    }
}
