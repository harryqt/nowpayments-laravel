<?php

declare(strict_types=1);

namespace Harryqt\NowPayments\Requests\Payments;

use Harryqt\NowPayments\Requests\BaseRequest;

class GetPaymentStatusRequest extends BaseRequest
{
    public function __construct(protected int $payment_id) {}

    public function resolveEndpoint(): string
    {
        return '/payment/'.$this->payment_id;
    }
}
