<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])->name('site.index');
Route::post('/add', [\App\Http\Controllers\SiteController::class, 'createOrder'])->name('site.add');
Route::post('/getPrice', [\App\Http\Controllers\SiteController::class, 'getPrice'])->name('site.get-price');
Route::get('/thankyou', function () {
    return view('site.thankyou');
})->name('site.thankyou');
