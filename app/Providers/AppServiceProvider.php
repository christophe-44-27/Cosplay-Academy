<?php

namespace App\Providers;

use App\Services\CourseService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Stripe\Stripe;

class AppServiceProvider extends ServiceProvider {
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //Use for MySQL < 5.7.7 version
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        Stripe::setApiKey(getenv('STRIPE_SECRET'));

        if ($this->app->isLocal()) {
            $this->app->register(TelescopeServiceProvider::class);
        }

        $this->app->bind(CourseService::class, function ($app) {
            return new CourseService();
        });
    }
}
