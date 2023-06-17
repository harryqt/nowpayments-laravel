<?php

declare(strict_types=1);

namespace Harry\NowPayments\Requests\Conversions;

use Harry\NowPayments\Traits\UseJwtAuth;
use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetConversionStatusRequest extends Request
{
    use UseJwtAuth;

    protected Method $method = Method::GET;

    public function __construct(protected int $conversionId)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/conversion/'.$this->conversionId;
    }
}
