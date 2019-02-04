<?php

namespace App\Listeners;

use App\Alert;
use App\Contracts\AlertNotifiable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AlertSuperListener
{
    protected $event;

    protected $alertCollection;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() {}
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(AlertNotifiable $notifiableEvent)
    {
        $this->event = $notifiableEvent;
        $this->alert = new Alert;
        $this->process();
    }

    public function __invoke($event)
    {
        return $this->handle($event);
    }

    public function process()
    {
        if($this->getAlerts()->isEmpty()){
            return null;
        }
        dd($this->event->getEventName());
    }

    public function getAlerts()
    {
        $this->alertCollection = collect();
        if(!empty($eventName = $this->event->getEventName())){
            $this->alertCollection = $this->alert->event($eventName)->get();
        }
        dd($this->alertCollection->first()->getTemplate()->getContent());
        return $this->alertCollection;
    }
}
