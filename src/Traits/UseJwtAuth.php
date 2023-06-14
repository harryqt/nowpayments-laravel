<?php

declare(strict_types=1);

namespace Harry\NowPaymentsLaravel\Traits;

trait UseJwtAuth
{
    protected function defaultAuth(): \Saloon\Contracts\Authenticator
    {
        return new \Harry\NowPaymentsLaravel\Contracts\JwtBasedAuthenticator();
    }
}
