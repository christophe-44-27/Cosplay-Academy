<?php

namespace App\Providers;

use App\Services\Billing\PaymentService;
use App\Services\Billing\StripeService;
use App\Services\CourseService;
use App\Services\Instructors\CourseContentService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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

        if ($this->app->isLocal()) {
            $this->app->register(TelescopeServiceProvider::class);
        }

        $this->app->bind(CourseService::class, function ($app) {
            return new CourseService();
        });

        $this->app->bind(StripeService::class, function ($app) {
            return new StripeService();
        });

        $this->app->bind(PaymentService::class, function ($app) {
            return new PaymentService();
        });

        $this->app->bind(CourseContentService::class, function ($app) {
            return new CourseContentService();
        });
    }
}
