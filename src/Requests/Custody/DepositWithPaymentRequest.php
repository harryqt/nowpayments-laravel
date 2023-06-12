<?php

declare(strict_types=1);

namespace Harry\NowPaymentsLaravel\Requests\Custody;

use Harry\NowPaymentsLaravel\Traits\UseJwtAuth;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class DepositWithPaymentRequest extends Request implements HasBody
{
    use HasJsonBody, UseJwtAuth;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $currency,
        protected float $amount,
        protected int $subPartnerId,
        protected bool $fixedRate = false,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/sub-partner/transfer';
    }

    protected function defaultBody(): array
    {
        $body = [
            'currency' => $this->currency,
            'amount' => $this->amount,
            'sub_partner_id' => $this->subPartnerId,
        ];

        $this->fixedRate ? $body['fixed_rate'] = $this->fixedRate : '';

        return $body;
    }
}
