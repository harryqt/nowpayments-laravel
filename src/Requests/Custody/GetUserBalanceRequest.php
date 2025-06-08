<?php

declare(strict_types=1);

namespace Harryqt\NowPayments\Requests\Custody;

use Harryqt\NowPayments\Requests\BaseRequest;

class GetUserBalanceRequest extends BaseRequest
{
    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/sub-partner/balance/'.$this->id;
    }
}
