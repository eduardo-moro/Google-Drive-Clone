<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The HOME constant defines the base directory path of the application.
     * It is used to construct absolute paths for including files, 
     * accessing resources, and other file system operations.
     * 
     * Example usage:
     * include HOME . '/config.php';
     */
    public const HOME = '/my-files';

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
        Vite::prefetch(concurrency: 3);
    }
}
