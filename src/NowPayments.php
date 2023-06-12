<?php

declare(strict_types=1);

namespace Harry\NowPaymentsLaravel;

use Saloon\Contracts\PendingRequest;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

class NowPayments extends Connector
{
    use AcceptsJson;

    public function resolveBaseUrl(): string
    {
        return 'https://api.nowpayments.io/v1/';
    }

    public function boot(PendingRequest $pendingRequest): void
    {
        $this->patchRequestQueryBooleans($pendingRequest);
    }

    /**
     * PHP's `http_build_query()` converts booleans to binary digit.
     * Eg: 'true' will be converted to 1 and 'false' to 0.
     * This converts true (bool) to 'true' (string) to maintain compatibility with NowPayments apis.
     */
    private function patchRequestQueryBooleans(PendingRequest $pendingRequest): void
    {
        $queries = $pendingRequest->query()->all();

        array_walk($queries, function (&$value) {
            if (is_bool($value)) {
                $value = $value ? 'true' : 'false';
            }
        });

        $pendingRequest->query()->set($queries);
    }
}
