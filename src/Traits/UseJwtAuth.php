<?php

declare(strict_types=1);

namespace App\Http\Integrations\NowPayments\Traits;

trait UseJwtAuth
{
    protected function defaultAuth(): ?\Saloon\Contracts\Authenticator
    {
        return new \App\Http\Integrations\NowPayments\Contracts\JwtBasedAuthenticator();
    }
}
