<?php

declare(strict_types=1);

namespace Harry\NowPaymentsLaravel\Requests\Custody;

use Harry\NowPaymentsLaravel\Traits\UseJwtAuth;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class TransferFundsToMasterAccountRequest extends Request implements HasBody
{
    use HasJsonBody, UseJwtAuth;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $currency,
        protected float $amount,
        protected int $subPartnerId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/sub-partner/write-off';
    }

    protected function defaultBody(): array
    {
        return [
            'currency' => $this->currency,
            'amount' => $this->amount,
            'sub_partner_id' => $this->subPartnerId,
        ];
    }
}
