<?php

namespace App\Providers;

use App\Services\TutorialService;
use Illuminate\Support\ServiceProvider;

class TutorialServiceProvider extends ServiceProvider {
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        $this->app->bind(TutorialService::class, function ($app) {
            return new TutorialService();
        });
    }
}
