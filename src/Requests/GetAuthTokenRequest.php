<?php

declare(strict_types=1);

namespace Harryqt\NowPayments\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class GetAuthTokenRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/auth';
    }

    protected function defaultBody(): array
    {
        $email = config('nowpayments.email');
        $password = config('nowpayments.password');

        throw_if($email === null, new \RuntimeException('Email not defined.'));
        throw_if($password === null, new \RuntimeException('Password not defined.'));

        return [
            'email' => $email,
            'password' => $password,
        ];
    }
}
