<?php

declare(strict_types=1);

namespace Harry\NowPaymentsLaravel\Traits;

trait UseKeyAuth
{
    protected function defaultAuth(): \Saloon\Contracts\Authenticator
    {
        return new \Harry\NowPaymentsLaravel\Contracts\KeyBasedAuthenticator();
    }
}
