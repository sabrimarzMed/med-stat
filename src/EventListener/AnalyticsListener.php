<?php

namespace App\EventListener;

use App\Event\AnalyticsEvent;
use App\Producer\AnalyticsProducer;

class AnalyticsListener
{
    public function __construct(private AnalyticsProducer $producer)
    {
    }

    public function onAnalyticsEvent(AnalyticsEvent $event): void
    {
        echo 'hello from analytics event listener';
        $this->producer->add($event);
    }
}
