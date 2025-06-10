<?php

declare(strict_types=1);

namespace Harryqt\NowPayments\Middleware;

use Closure;
use Illuminate\Http\Request;
use RuntimeException;
use Symfony\Component\HttpFoundation\Response;

class EnsureIpnIsValid
{
    /**
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ipn_secret = env('NOWPAYMENTS_IPN_SECRET');
        throw_if($ipn_secret === null, new \RuntimeException('ipn secret key not defined.'));

        if (! $request->hasHeader('x-nowpayments-sig')) {
            throw new RuntimeException('x-nowpayments-sig header is missing.');
        }

        if (! $requestData = $request->all()) {
            throw new RuntimeException('input fields are missing.');
        }

        ksort($requestData);
        $hash = hash_hmac('sha512', json_encode($requestData), $ipn_secret);

        if ($hash !== $request->header('x-nowpayments-sig')) {
            throw new RuntimeException('Calculated hash differs from received hash.');
        }

        return $next($request);
    }
}
