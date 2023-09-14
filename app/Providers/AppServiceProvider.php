<?php

namespace App\Providers;

use App\Models\ApiService;
use App\Services\Api\ParsingServiceAbstract;
use App\Services\Api\ParsingServiceFirst;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        /**
         * Плохая практика! Подумать о привязке внутри самой команды
         * app()->makeWith(ParsingServiceFirst::class, ['apiService' => $apiService]);
         */
        app()->bind(ParsingServiceAbstract::class, function () {
            $apiService = ApiService::where('name', 'ApiServiceOne')->first();
            return new ParsingServiceFirst($apiService);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('vendor.pagination.bootstrap-4');
    }
}
