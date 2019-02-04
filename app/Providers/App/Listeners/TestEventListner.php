<?php

namespace App\Providers\App\Listeners;

use App\Providers\App\Events\TestEventFired;
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
        //
    }

    /**
     * Handle the event.
     *
     * @param  TestEventFired  $event
     * @return void
     */
    public function handle(TestEventFired $event)
    {
        //
    }
}
