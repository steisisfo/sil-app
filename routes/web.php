<?php

use Illuminate\Support\Facades\Route;

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
    }
    return back();
})->name('lang.switch');

Route::get('/', \App\Livewire\Home::class)->name('home');
Route::get('/berita', \App\Livewire\NewsIndex::class)->name('news.index');
Route::get('/berita/{slug}', \App\Livewire\NewsShow::class)->name('news.show');
