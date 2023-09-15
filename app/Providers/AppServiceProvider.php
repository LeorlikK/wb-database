<?php

namespace App\Providers;

use App\Services\Api\ParsingServiceAbstract;
use App\Services\Api\ParsingServiceCircle;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind(ParsingServiceAbstract::class, ParsingServiceCircle::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('vendor.pagination.bootstrap-4');
    }
}
