<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\TradeHistory;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();
        Setting::created(function ($model) {
            $model->user_id = auth()->id();
            $model->save();
        });
        TradeHistory::created(function ($model) {
            $model->user_id = auth()->id();
            $model->save();
        });
    }
}
