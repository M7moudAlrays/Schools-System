<?php

namespace App\Providers;

use App\Repositories\Interfaces\TeacherRepoInterface;
use App\Repositories\TeacherRepo;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TeacherRepoInterface::class,TeacherRepo::class) ;
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
