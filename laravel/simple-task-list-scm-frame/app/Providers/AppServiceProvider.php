<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Dao Registeration
        $this->app->bind('App\Contracts\Dao\TaskDaoInterface','App\Dao\TaskDao');

        //Business Logic Registeration
        $this->app->bind('App\Contracts\Services\TaskServiceInterface','App\Services\TaskService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
