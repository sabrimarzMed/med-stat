<?php

namespace App\Services;

use App\Event\AnalyticsEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;

class AnalyticsService
{
    public function __construct(private EventDispatcherInterface $eventDispatcher)
    {
    }

    public function handleAnalyticsEvent(Request $request): void
    {
        echo 'hello from service';
        $this->eventDispatcher->dispatch(new AnalyticsEvent($request->query->all(), $request->request->all()), 'analytics_event');
    }
}
