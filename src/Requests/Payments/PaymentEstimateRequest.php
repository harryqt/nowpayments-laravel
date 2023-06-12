<?php

declare(strict_types=1);

namespace App\Http\Integrations\NowPayments\Requests\Payments;

use App\Http\Integrations\NowPayments\Traits\UseKeyAuth;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class PaymentEstimateRequest extends Request
{
    use UseKeyAuth;

    protected Method $method = Method::POST;

    public function __construct(protected int $id)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/payment/'.$this->id.'/update-merchant-estimate';
    }
}
