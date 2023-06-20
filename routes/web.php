<?php

use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeachersController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
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

Route::get('/ ', function () {
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
            route::Post('Filter_Classes', [ClassRoomController::class, 'Filter_Classes'])->name('Filter_Classes') ;
            route::delete('delete_all', [ClassRoomController::class, 'delete_all'])->name('delete_all') ;

            route::resource('Sections',SectionsController::class) ;
            route::get('classes/{id}', [SectionsController::class , 'getclasses']);


            Route::view('add_parent','livewire.show_Form') ;
            Route::resource('Teachers',TeachersController::class) ;

            Route::resource('Students', StudentController::class);
            Route::get('Get_classrooms/{id}',[StudentController::class, 'Get_classrooms']) ;
            Route::get('Get_Sections/{id}', [StudentController::class , 'Get_Sections']) ;
            Route::post('Upload_attachment' , [StudentController::class , 'Upload_attachment'])->name('Upload_attachment') ;
            Route::get('Download_attachment/{Std_Name}/{File_Name}' , [StudentController::class , 'Download_attachment'])->name('Download_attachment') ;          
            Route::post('Delete_attachment' , [StudentController::class , 'Delete_attachment'])->name('Delete_attachment') ;          

            // route::get('livewire-test',function()
            // {
            //     return view('livewire.livewire_Test');
            // }) ;
        });
    });