<?php

namespace App\Providers;

use App\Services\TicketDataService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(TicketDataService::class);
    }

    public function boot(): void
    {
        //
    }
}
