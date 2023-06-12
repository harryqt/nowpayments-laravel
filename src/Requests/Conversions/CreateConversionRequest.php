<?php

declare(strict_types=1);

namespace Harry\NowPaymentsLaravel\Requests\Conversions;

use Harry\NowPaymentsLaravel\Traits\UseJwtAuth;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class CreateConversionRequest extends Request implements HasBody
{
    use HasJsonBody, UseJwtAuth;

    protected Method $method = Method::POST;

    public function __construct(
        protected float $amount,
        protected string $from_currency,
        protected string $to_currency,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/conversion';
    }

    protected function defaultBody(): array
    {
        return [
            'amount' => $this->amount,
            'from_currency' => $this->from_currency,
            'to_currency' => $this->to_currency,
        ];
    }
}
