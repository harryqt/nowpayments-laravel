<?php

declare(strict_types=1);

namespace Harry\NowPayments\Contracts;

use Saloon\Contracts\Authenticator;
use Saloon\Contracts\PendingRequest;

class KeyBasedAuthenticator implements Authenticator
{
    public function set(PendingRequest $pendingRequest): void
    {
        $pendingRequest->headers()->add('X-Api-Key', $this->getApiKey());
    }

    private function getApiKey(): string
    {
        $key = config('nowpayments.key');

        throw_if($key === null, new \RuntimeException('Api key not defined.'));

        return $key;
    }
}
