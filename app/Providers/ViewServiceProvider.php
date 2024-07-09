<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\Repository\AccessLevelSpaceRepository;
use App\Models\AccessLevelSpace;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
           if(Auth::user()){
               $accessLevelSpaces = AccessLevelSpace::all();
               $spaces = User::find(Auth::user()->id)->Spaces()->get();
               View::share('accessLevel', $accessLevelSpaces);
               View::share('spaces', $spaces);
           }
        });
    }
}
