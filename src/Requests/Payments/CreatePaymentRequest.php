<?php

declare(strict_types=1);

namespace Harry\NowPayments\Requests\Payments;

use Harry\NowPayments\Traits\UseKeyAuth;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class CreatePaymentRequest extends Request implements HasBody
{
    use HasJsonBody, UseKeyAuth;

    protected Method $method = Method::POST;

    public function __construct(
        protected float $priceAmount,
        protected string $priceCurrency,
        protected string $payCurrency,
        protected ?float $payAmount = null,
        protected ?string $ipnCallbackUrl = null,
        protected ?string $orderId = null,
        protected ?string $orderDescription = null,
        protected ?int $purchaseId = null,
        protected ?string $payoutAddress = null,
        protected ?string $payoutCurrency = null,
        protected ?string $payoutExtraId = null,
        protected bool $isFixedRate = false,
        protected bool $isFeePaidByUser = false,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/payment';
    }

    protected function defaultBody(): array
    {
        $body = [
            'price_amount' => $this->priceAmount,
            'price_currency' => $this->priceCurrency,
            'pay_currency' => $this->payCurrency,
        ];

        $this->payAmount ? $body['pay_amount'] = $this->payAmount : '';
        $this->ipnCallbackUrl ? $body['ipn_callback_url'] = $this->ipnCallbackUrl : '';
        $this->orderId ? $body['order_id'] = $this->orderId : '';
        $this->orderDescription ? $body['order_description'] = $this->orderDescription : '';
        $this->purchaseId ? $body['purchase_id'] = $this->purchaseId : '';
        $this->payoutAddress ? $body['payout_address'] = $this->payoutAddress : '';
        $this->payoutCurrency ? $body['payout_currency'] = $this->payoutCurrency : '';
        $this->payoutExtraId ? $body['payout_extra_id'] = $this->payoutExtraId : '';
        $this->isFixedRate ? $body['is_fixed_rate'] = $this->isFixedRate : '';
        $this->isFeePaidByUser ? $body['is_fee_paid_by_user'] = $this->isFeePaidByUser : '';

        return $body;
    }
}
