<?php

declare(strict_types=1);

namespace Harry\NowPaymentsLaravel\Requests\Payouts;

use Harry\NowPaymentsLaravel\Traits\UseKeyAuth;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetBalanceRequest extends Request
{
    use UseKeyAuth;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/balance';
    }
}
