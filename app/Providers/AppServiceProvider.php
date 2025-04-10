<?php

namespace App\Providers;
use App\Models\Notifications;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        View::composer('layouts.master', function ($view) {
            $userId = Auth::id();
            $latestNotifications = Notifications::where('user_id', $userId)->where('status', 'N')->latest()->take(3)->get();
            $totalNotifications = Notifications::where('user_id', $userId)->where('status', 'N')->count();
            $view->with('totalNotifications', $totalNotifications);
            $view->with('latestNotifications', $latestNotifications);
        });
    }
}
