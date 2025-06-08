<?php

declare(strict_types=1);

namespace Harryqt\NowPayments\Middleware;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureIpnIsValid
{
    public function handle(Request $request, \Closure $next): Response
    {
        if (! $request->hasHeader('x-nowpayments-sig')) {
            throw new \RuntimeException('x-nowpayments-sig header is missing.');
        }

        if (! $requestData = $request->all()) {
            throw new \RuntimeException('input fields are missing.');
        }

        ksort($requestData);
        $hash = hash_hmac('sha512', json_encode($requestData), config('nowpayments.ipn_secret'));

        if ($hash !== $request->header('x-nowpayments-sig')) {
            throw new \RuntimeException('Calculated hash differs from received hash.');
        }

        return $next($request);
    }
}
