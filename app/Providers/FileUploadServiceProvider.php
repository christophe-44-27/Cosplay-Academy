<?php

namespace App\Providers;

use App\Services\FileUploadService;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class FileUploadServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        $this->app->bind(FileUploadService::class, function ($app) {
            return new FileUploadService();
        });
    }
}
