<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\AlertSuperListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        /*\App\Events\TestEventFired::class => [
            \App\Listeners\TestEventListner::class
        ],
        \App\Events\TestEventAgain::class => [
            \App\Listeners\TestEventListner::class
        ]*/
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        $events = [
            \App\Events\TestEventFired::class,
            \App\Events\TestEventAgain::class
        ];

        

       
        /*Event::listen($events, function ($data) {
            dd($data);
        });*/
        Event::listen($events, new AlertSuperListener);
        
        //+
        
    }
}
