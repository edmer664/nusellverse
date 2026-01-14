<?php

use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\HomePage::class)->name('home');
Route::get('/stores/{store}', \App\Livewire\StoreDetail::class)->name('stores.show');

Route::post('/stores/{store}/reviews', [ReviewController::class, 'store'])
    ->middleware('throttle:3,60')
    ->name('stores.reviews.store');

Route::view('/about', 'pages.about')->name('about');
Route::view('/terms', 'pages.terms')->name('terms');
Route::view('/privacy', 'pages.privacy')->name('privacy');
