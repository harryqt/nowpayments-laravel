<?php

declare(strict_types=1);

namespace Harry\NowPayments\Requests\Currencies;

use Harry\NowPayments\Traits\UseKeyAuth;
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
