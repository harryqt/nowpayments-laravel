<?php

declare(strict_types=1);

namespace Harryqt\NowPayments\Contracts;

use Harryqt\NowPayments\Requests\GetAuthTokenRequest;
use Illuminate\Support\Facades\Cache;
use Saloon\Contracts\Authenticator;
use Saloon\Http\PendingRequest;

class JwtAuthenticator implements Authenticator
{
    public function set(PendingRequest $pendingRequest): void
    {
        // Make sure to ignore the authentication request to prevent loops.
        if ($pendingRequest->getRequest() instanceof GetAuthTokenRequest) {
            return;
        }

        // Store the cache for 290 seconds instead of 300, so it
        // can get a new token before the old expires.
        $token = Cache::remember('nowpayments-bearer-jwt-token', 290, function () use ($pendingRequest) {
            return $pendingRequest->getConnector()->send(new GetAuthTokenRequest)->json('token');
        });

        $pendingRequest->headers()->add('Authorization', 'Bearer '.$token);
    }
}
