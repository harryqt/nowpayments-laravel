<?php

declare(strict_types=1);

namespace Harry\NowPaymentsLaravel;

use Illuminate\Support\ServiceProvider;

class NowPaymentsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        $this->app->singleton(NowPayments::class, fn () => new NowPayments());
    }
}
