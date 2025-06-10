<?php

declare(strict_types=1);

namespace Harryqt\NowPayments;

use Saloon\Http\Connector;
use Saloon\Http\PendingRequest;
use Saloon\Traits\Plugins\AcceptsJson;

class NowPaymentsConnector extends Connector
{
    use AcceptsJson;

    public function resolveBaseUrl(): string
    {
        return 'https://api.nowpayments.io/v1/';
        // return 'https://api-sandbox.nowpayments.io/v1/';
    }

    public function boot(PendingRequest $pendingRequest): void
    {
        $queries = $pendingRequest->query()->all();

        // PHP's `http_build_query()` function converts booleans to binary digit.
        // Eg: 'true' will be converted to 1 and 'false' to 0.
        // This converts 'true' (bool) to 'true' (string) to maintain compatibility with NowPayments apis.
        array_walk($queries, function (&$value) {
            if (is_bool($value)) {
                $value = $value ? 'true' : 'false';
            }
        });

        $pendingRequest->query()->set($queries);
    }

    protected function defaultHeaders(): array
    {
        return [
            'X-Api-Key' => $this->getApiKey(),
        ];
    }

    private function getApiKey(): string
    {
        $key = config('nowpayments.key');

        throw_if($key === null, new \RuntimeException('Api key not defined.'));

        return $key;
    }
}
