<?php

namespace App\Providers;

use App\Interfaces\FileColumnRepositoryInterface;
use App\Interfaces\FileRepositoryInterface;
use App\Repositories\FileColumnRepository;
use App\Repositories\FileRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(FileRepositoryInterface::class, FileRepository::class);
        $this->app->bind(FileColumnRepositoryInterface::class, FileColumnRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
