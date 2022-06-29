<?php

namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;

class AnalyticsEvent extends Event
{
    public function __construct(private array $queryParams,
                                private array $bodyParams,
                                private string $action = 'add')
    {
    }

    /** @return array */
    public function getPayload(): array
    {
        $payload = [];
        $payload['query'] = $this->queryParams;
        $payload['body'] = $this->bodyParams;

        return $payload;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function setAction(string $action): void
    {
        $this->action = $action;
    }

    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    public function setQueryParams(array $queryParams): void
    {
        $this->queryParams = $queryParams;
    }

    public function getBodyParams(): array
    {
        return $this->bodyParams;
    }

    public function setBodyParams(array $bodyParams): void
    {
        $this->bodyParams = $bodyParams;
    }
}
