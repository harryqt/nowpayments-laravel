<?php

declare(strict_types=1);

namespace Harry\NowPayments\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetApiStatusRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/status';
    }
}
