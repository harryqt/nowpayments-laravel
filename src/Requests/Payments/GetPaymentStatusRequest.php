<?php

declare(strict_types=1);

namespace Harry\NowPayments\Requests\Payments;

use Harry\NowPayments\Traits\UseKeyAuth;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetPaymentStatusRequest extends Request
{
    use UseKeyAuth;

    protected Method $method = Method::GET;

    public function __construct(protected int $paymentId)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/payment/'.$this->paymentId;
    }
}
