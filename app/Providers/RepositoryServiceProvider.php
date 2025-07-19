<?php

namespace App\Providers;

use App\Interfaces\AuthRepositoryInterface;
use App\Interfaces\ReportCategoryRepositoryInterface;
use App\Interfaces\ReportRepositoryInterface;
use App\Interfaces\ReportStatusRepositoryInterface;
use App\Interfaces\ResidentRepositoryInterface;
use App\Repositories\AuthRepository;
use App\Repositories\ReportCategoryRepository;
use App\Repositories\ReportRepository;
use App\Repositories\ReportStatusRepository;
use App\Repositories\ResidentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(ResidentRepositoryInterface::class, ResidentRepository::class);
        $this->app->bind(ReportCategoryRepositoryInterface::class, ReportCategoryRepository::class);
        $this->app->bind(ReportRepositoryInterface::class, ReportRepository::class);
        $this->app->bind(ReportStatusRepositoryInterface::class, ReportStatusRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
