<?php

declare(strict_types=1);

namespace Harryqt\NowPayments\Requests\Payments;

use Harryqt\NowPayments\Requests\BaseRequest;

class GetEstimatedPriceRequest extends BaseRequest
{
    public function __construct(
        protected float $amount,
        protected string $currency_from,
        protected string $currency_to,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/estimate';
    }

    protected function defaultQuery(): array
    {
        return $this->getConstructorParams();
    }
}
