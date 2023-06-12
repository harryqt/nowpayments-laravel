<?php

declare(strict_types=1);

namespace App\Http\Integrations\NowPayments\Requests;

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
        return [
            'email' => env('NOWPAYMENTS_EMAIL'),
            'password' => env('NOWPAYMENTS_PASSWORD'),
        ];
    }
}
