<?php

namespace App\Providers;

use App\Repositories\Interfaces\StudentRepoInterface;
use App\Repositories\Interfaces\TeacherRepoInterface;
use App\Repositories\Interfaces\StudentPromotionInterface;
use App\Repositories\Interfaces\StudentGraduatedinterface;




use App\Repositories\StudentRepo;
use App\Repositories\TeacherRepo;
use App\Repositories\StudentPromotionRepo;
use App\Repositories\StudentGraduatedRepo;


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
        $this->app->bind(TeacherRepoInterface::class , TeacherRepo::class) ;

        $this->app->bind(StudentRepoInterface::class , StudentRepo::class) ;

        $this->app->bind(StudentPromotionInterface::class , StudentPromotionRepo::class) ;

        $this->app->bind(StudentGraduatedinterface::class , StudentGraduatedRepo::class) ;
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
