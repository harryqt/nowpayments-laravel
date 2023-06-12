<?php

declare(strict_types=1);

namespace App\Http\Integrations\NowPayments\Requests\Conversions;

use App\Http\Integrations\NowPayments\Traits\UseJwtAuth;
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
        return '/conversion';
    }

    protected function defaultQuery(): array
    {
        $queries = [];

        $this->conversionId ? $queries['conversion_id'] = $this->conversionId : '';

        return $queries;
    }
}
