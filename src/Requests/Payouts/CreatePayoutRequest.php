<?php

declare(strict_types=1);

namespace App\Http\Integrations\NowPayments\Requests\Payouts;

use App\Http\Integrations\NowPayments\Traits\UseKeyAuth;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class CreatePayoutRequest extends Request implements HasBody
{
    use HasJsonBody, UseKeyAuth;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $address,
        protected string $currency,
        protected float $amount,
        protected ?string $extraId = null,
        protected ?string $ipnCallbackUrl = null,
        protected ?string $payoutDescription = null,
        protected ?string $uniqueExternalId = null,
        protected ?float $fiatAmount = null,
        protected ?string $fiatCurrency = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/payout';
    }

    protected function defaultBody(): array
    {
        $body = [
            'address' => $this->address,
            'currency' => $this->currency,
            'amount' => $this->amount,
        ];

        $this->extraId ? $body['extra_id'] = $this->extraId : '';
        $this->ipnCallbackUrl ? $body['ipn_callback_url'] = $this->ipnCallbackUrl : '';
        $this->payoutDescription ? $body['payout_description'] = $this->payoutDescription : '';
        $this->uniqueExternalId ? $body['unique_external_id'] = $this->uniqueExternalId : '';
        $this->fiatAmount ? $body['fiat_amount'] = $this->fiatAmount : '';
        $this->fiatCurrency ? $body['fiat_currency'] = $this->fiatCurrency : '';

        return $body;
    }
}
