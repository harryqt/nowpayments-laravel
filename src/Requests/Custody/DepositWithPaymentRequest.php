<?php

declare(strict_types=1);

namespace Harryqt\NowPayments\Requests\Custody;

use Harryqt\NowPayments\Contracts\JwtAuthenticator;
use Harryqt\NowPayments\Requests\BaseRequest;
use Saloon\Contracts\Authenticator;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

class DepositWithPaymentRequest extends BaseRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected string $currency,
        protected int|float|string $amount,
        protected int|string $sub_partner_id,
        protected bool $is_fixed_rate = false,
        protected bool $is_fee_paid_by_user = false,
        protected ?string $ipn_callback_url = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/sub-partner/payment';
    }

    protected function defaultBody(): array
    {
        return $this->getConstructorParams();
    }

    protected function defaultAuth(): Authenticator
    {
        return new JwtAuthenticator;
    }
}
