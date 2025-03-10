<?php

namespace App\Providers;

use App\interface\CourseManagementInterface;
use App\Repositories\CourseManagementRepository;
use App\Services\CourseManagementService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CourseManagementInterface::class, CourseManagementRepository::class);
        
        $this->app->bind(CourseManagementService::class, function ($app) {
            return new CourseManagementService($app->make(CourseManagementInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
