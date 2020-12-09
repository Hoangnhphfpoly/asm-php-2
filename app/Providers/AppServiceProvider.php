<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('edit', function ($user){
            if ($user->role_id <= 2){
                return true;
            }else{
                return false;
            }
        });

        Gate::define('cant-delete', function ($user){
            if ($user->role_id > 1){
                return false;
            }
        });
    }
}
