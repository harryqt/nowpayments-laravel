<?php

declare(strict_types=1);

namespace Harryqt\NowPayments\Requests;

class GetApiStatusRequest extends BaseRequest
{
    public function resolveEndpoint(): string
    {
        return '/status';
    }
}
