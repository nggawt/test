<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\myRepo\ShopeProcesorService;

class ShopeProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(ShopeProcesorService::class,function($app){
            return new ShopeProcesorService();
        });
    }
}
