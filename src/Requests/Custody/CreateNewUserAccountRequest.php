<?php

declare(strict_types=1);

namespace App\Http\Integrations\NowPayments\Requests\Custody;

use App\Http\Integrations\NowPayments\Traits\UseJwtAuth;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class CreateNewUserAccountRequest extends Request implements HasBody
{
    use HasJsonBody, UseJwtAuth;

    protected Method $method = Method::POST;

    public function __construct(protected string $name)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/sub-partner/balance';
    }

    protected function defaultBody(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
