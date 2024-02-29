<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;


class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
        if (Auth::check()) {
            $user = Auth::user();
            $roleId = $user->role_id;
            $userName = $user->name;
            $view->with('userName', $userName)->with('roleId', $roleId);
        }
        else{
            View::share('userName','null');
        }
    });
    }
}
