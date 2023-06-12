<?php

declare(strict_types=1);

namespace Harry\NowPaymentsLaravel\Requests\Custody;

use Harry\NowPaymentsLaravel\Traits\UseJwtAuth;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetUserBalanceRequest extends Request
{
    use UseJwtAuth;

    protected Method $method = Method::GET;

    public function __construct(protected int $id)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/sub-partner/balance/'.$this->id;
    }
}
