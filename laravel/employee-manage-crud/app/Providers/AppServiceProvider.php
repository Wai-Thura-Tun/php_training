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
        $this->app->bind('App\Contracts\Dao\EmployeeDaoInterface','App\Dao\EmployeeDao');
        //Service Registeration
        $this->app->bind('App\Contracts\Services\EmployeeServiceInterface','App\Services\EmployeeService');
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
