<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade; 
use App\Repositories\Contracts\GuaranteeRepositoryInterface;
use App\Repositories\GuaranteeRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GuaranteeRepositoryInterface::class, GuaranteeRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('layouts.admin', 'admin-layout');
    }
}
