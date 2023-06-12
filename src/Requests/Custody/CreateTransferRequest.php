<?php

declare(strict_types=1);

namespace Harry\NowPaymentsLaravel\Requests\Custody;

use Harry\NowPaymentsLaravel\Traits\UseJwtAuth;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class CreateTransferRequest extends Request implements HasBody
{
    use HasJsonBody, UseJwtAuth;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $currency,
        protected float $amount,
        protected int $fromId,
        protected int $toId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/sub-partner/transfer';
    }

    protected function defaultBody(): array
    {
        return [
            'currency' => $this->currency,
            'amount' => $this->amount,
            'from_id' => $this->fromId,
            'to_id' => $this->toId,
        ];
    }
}
