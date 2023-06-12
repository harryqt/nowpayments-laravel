<?php

declare(strict_types=1);

namespace App\Http\Integrations\NowPayments\Requests\Payouts;

use App\Http\Integrations\NowPayments\Traits\UseKeyAuth;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class VerifyPayoutRequest extends Request implements HasBody
{
    use HasJsonBody, UseKeyAuth;

    protected Method $method = Method::POST;

    public function __construct(protected int $withdrawalId)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/payout/'.$this->withdrawalId.'/verify';
    }
}
