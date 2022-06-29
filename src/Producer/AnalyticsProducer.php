<?php

namespace App\Producer;

use App\Event\AnalyticsEvent;
use OldSound\RabbitMqBundle\RabbitMq\ProducerInterface;

class AnalyticsProducer
{
    public function __construct(private ProducerInterface $producer)
    {
    }

    public function add(AnalyticsEvent $event)
    {
        $payload = $event->getPayload();
        $this->producer->publish(json_encode($event->getPayload()), 'AI', $event->getPayload());
    }
}
