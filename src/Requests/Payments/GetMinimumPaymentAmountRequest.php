<?php

declare(strict_types=1);

namespace Harryqt\NowPayments\Requests\Payments;

use Harryqt\NowPayments\Requests\BaseRequest;

class GetMinimumPaymentAmountRequest extends BaseRequest
{
    public function __construct(
        protected string $currency_from,
        protected string $currency_to,
        protected string $fiat_equivalent = 'usd',
        protected bool $is_fixed_rate = false,
        protected bool $is_fee_paid_by_user = false,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/min-amount';
    }

    protected function defaultQuery(): array
    {
        return $this->getConstructorParams();
    }
}
