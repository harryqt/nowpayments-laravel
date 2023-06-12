<?php

declare(strict_types=1);

namespace App\Http\Integrations\NowPayments\Contracts;

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
        return env('NOWPAYMENTS_API_KEY');
    }
}
