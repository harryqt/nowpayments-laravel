<?php

declare(strict_types=1);

namespace App\Http\Integrations\NowPayments\Requests\Payouts;

use App\Http\Integrations\NowPayments\Traits\UseKeyAuth;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class ValidateAddressRequest extends Request implements HasBody
{
    use HasJsonBody, UseKeyAuth;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $address,
        protected string $currency,
        protected ?string $extraId = null
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/payout/validate-address';
    }

    protected function defaultBody(): array
    {
        $body = [
            'address' => $this->address,
            'currency' => $this->currency,
        ];

        $this->extraId ? $body['extra_id'] = $this->extraId : '';

        return $body;
    }
}
