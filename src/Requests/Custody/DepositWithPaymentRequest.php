<?php

declare(strict_types=1);

namespace Harry\NowPayments\Requests\Custody;

use Harry\NowPayments\Traits\UseKeyAuth;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class DepositWithPaymentRequest extends Request implements HasBody
{
    use HasJsonBody, UseKeyAuth;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $currency,
        protected float $amount,
        protected int|string $subPartnerId,
        protected bool $fixedRate = false,
        protected bool $feePaidByUser = false,
        protected ?string $ipnCallbackUrl = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/sub-partner/payment';
    }

    protected function defaultBody(): array
    {
        $body = [
            'currency' => $this->currency,
            'amount' => $this->amount,
            'sub_partner_id' => strval($this->subPartnerId),
            'is_fixed_rate' => $this->fixedRate,
            'is_fee_paid_by_user' => $this->feePaidByUser,
        ];

        if ($this->ipnCallbackUrl) {
            $body['ipn_callback_url'] = $this->ipnCallbackUrl;
        }

        return $body;
    }
}
