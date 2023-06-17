<?php

declare(strict_types=1);

namespace Harry\NowPayments\Requests\Payments;

use Harry\NowPayments\Traits\UseKeyAuth;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetEstimatedPriceRequest extends Request
{
    use UseKeyAuth;

    protected Method $method = Method::GET;

    public function __construct(
        protected int $amount,
        protected string $currencyFrom,
        protected string $currencyTo,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/estimate';
    }

    protected function defaultQuery(): array
    {
        return [
            'amount' => $this->amount,
            'currency_from' => $this->currencyFrom,
            'currency_to' => $this->currencyTo,
        ];
    }
}
