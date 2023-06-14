<?php

declare(strict_types=1);

namespace Harry\NowPaymentsLaravel\Requests;

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

        throw_if($email === null, new \RuntimeException('Email is not defined.'));
        throw_if($password === null, new \RuntimeException('Password is not defined.'));

        return [
            'email' => $email,
            'password' => $password,
        ];
    }
}
