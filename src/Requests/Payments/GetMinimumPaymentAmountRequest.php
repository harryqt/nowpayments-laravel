<?php

declare(strict_types=1);

namespace Harry\NowPayments\Requests\Payments;

use Harry\NowPayments\Traits\UseKeyAuth;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetMinimumPaymentAmountRequest extends Request
{
    use UseKeyAuth;

    protected Method $method = Method::GET;

    public function __construct(
        protected string $currencyFrom,
        protected string $currencyTo,
        protected bool $fiatEquivalent = false,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/min-amount';
    }

    protected function defaultQuery(): array
    {
        $queries = [
            'currency_from' => $this->currencyFrom,
            'currency_to' => $this->currencyTo,
        ];

        $this->fiatEquivalent ? $queries['fiat_equivalent'] = $this->fiatEquivalent : '';

        return $queries;
    }
}
