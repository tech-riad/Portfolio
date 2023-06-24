<?php

use App\Http\Controllers\ContactUsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::post('/store',[ContactUsController::class,'store'])->name('message.store');
