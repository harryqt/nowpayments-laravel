<?php

declare(strict_types=1);

namespace Harry\NowPaymentsLaravel;

use Illuminate\Support\ServiceProvider;

class NowPaymentsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/nowpayments.php' => config_path('nowpayments.php'),
        ]);
    }

    public function register(): void
    {
        $this->app->singleton(NowPayments::class, fn () => new NowPayments);
    }
}
