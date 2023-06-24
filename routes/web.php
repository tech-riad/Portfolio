<?php

use App\Http\Controllers\SectionController;
use App\Http\Controllers\ServiceSectionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('frontend.index');
});

Auth::routes();

Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');



Route::group(['as'=>'admin.','prefix'=>'admin'],function(){

    Route::group(['as'=>'section.','prefix'=>'section'],function(){

            Route::get('/',[SectionController::class,'index'])->name('index');
            Route::get('/create',[SectionController::class,'create'])->name('create');
            Route::post('/store',[SectionController::class,'store'])->name('store');
            Route::any('/edit/{id}',[SectionController::class,'edit'])->name('edit');
            Route::put('/update/{id}',[SectionController::class,'update'])->name('update');
            // Route::any('/destroy/{id}',[SectionController::class,'destroy'])->name('destroy');


    });
    Route::group(['as'=>'service.','prefix'=>'service'],function(){

            Route::get('/',[ServiceSectionController::class,'index'])->name('index');
            Route::get('/create',[ServiceSectionController::class,'create'])->name('create');
            Route::post('/store',[ServiceSectionController::class,'store'])->name('store');
            Route::any('/edit/{id}',[ServiceSectionController::class,'edit'])->name('edit');
            Route::put('/update/{id}',[ServiceSectionController::class,'update'])->name('update');
            Route::any('/destroy/{id}',[ServiceSectionController::class,'destroy'])->name('destroy');


    });



});


require (base_path('routes/website.php'));
