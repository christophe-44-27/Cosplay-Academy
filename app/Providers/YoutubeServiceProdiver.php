<?php

namespace App\Providers;

use App\Services\ExtractYoutubeVideoIdService;
use Illuminate\Support\ServiceProvider;

class YoutubeServiceProdiver extends ServiceProvider {
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
        $this->app->bind(ExtractYoutubeVideoIdService::class, function ($app) {
            return new ExtractYoutubeVideoIdService();
        });
    }
}
