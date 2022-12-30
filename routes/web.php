<?php

use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\GradesController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use NunoMaduro\Collision\Contracts\Adapters\Phpunit\HasPrintableTestCaseName;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('welcome', function () {
    return view('welcome');
});

    
Route::get('test', function ()
{
    return view('test') ;
});



Route::group(
    ['prefix' => LaravelLocalization::setLocale(), 
     'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () 
    {
        Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'),'verified'
        ])->group(function () 
        {
            Route::get('dashboard', function () 
            {
                return view('dashboard');
            });
            
            route::resource('grades',GradesController::class) ;
            route::resource('Classrooms', ClassRoomController::class) ;
        });
    });