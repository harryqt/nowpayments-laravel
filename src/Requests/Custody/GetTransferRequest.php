<?php

declare(strict_types=1);

namespace Harry\NowPaymentsLaravel\Requests\Custody;

use Harry\NowPaymentsLaravel\Traits\UseJwtAuth;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetTransferRequest extends Request
{
    use UseJwtAuth;

    protected Method $method = Method::GET;

    public function __construct(protected int $id = null)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/sub-partner/transfer/'.$this->id;
    }
}
