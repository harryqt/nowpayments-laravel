<?php

declare(strict_types=1);

namespace Harry\NowPayments\Traits;

trait UseJwtAuth
{
    protected function defaultAuth(): \Saloon\Contracts\Authenticator
    {
        return new \Harry\NowPayments\Contracts\JwtBasedAuthenticator();
    }
}
