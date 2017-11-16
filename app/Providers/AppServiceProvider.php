<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Tasks\TaskInterface;
use App\Repositories\Tasks\TaskRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TaskInterface::class,
            TaskRepository::class);
    }
}
