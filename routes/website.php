<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('frontend.index');
// });
Route::post('/store',[ContactUsController::class,'store'])->name('message.store');

Route::get('/',[WebsiteController::class,'index'])->name('frontend.index');
