<?php

declare(strict_types=1);

namespace App\Http\Integrations\NowPayments\Requests\Currencies;

use App\Http\Integrations\NowPayments\Traits\UseKeyAuth;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAvailableCurrenciesFullRequest extends Request
{
    use UseKeyAuth;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/full-currencies';
    }
}
