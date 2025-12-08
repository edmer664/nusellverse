<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\HomePage::class)->name('home');
Route::get('/stores/{store}', \App\Livewire\StoreDetail::class)->name('stores.show');
