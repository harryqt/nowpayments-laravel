<?php

declare(strict_types=1);

namespace App\Http\Integrations\NowPayments\Requests\Currencies;

use App\Http\Integrations\NowPayments\Traits\UseKeyAuth;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAvailableCurrenciesCheckedRequest extends Request
{
    use UseKeyAuth;

    protected Method $method = Method::GET;

    public function __construct(protected bool $fixedRate = false)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/currencies';
    }

    protected function defaultQuery(): array
    {
        $queries = [];

        $this->fixedRate ? $queries['fixed_rate'] = $this->fixedRate : '';

        return $queries;
    }
}
