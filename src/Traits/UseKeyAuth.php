<?php

declare(strict_types=1);

namespace Harry\NowPayments\Traits;

trait UseKeyAuth
{
    protected function defaultAuth(): \Saloon\Contracts\Authenticator
    {
        return new \Harry\NowPayments\Contracts\KeyBasedAuthenticator();
    }
}
