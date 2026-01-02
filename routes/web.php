<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\HomePage::class)->name('home');
Route::get('/stores/{store}', \App\Livewire\StoreDetail::class)->name('stores.show');

Route::view('/about', 'pages.about')->name('about');
Route::view('/terms', 'pages.terms')->name('terms');
Route::view('/privacy', 'pages.privacy')->name('privacy');
