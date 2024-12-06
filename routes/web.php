<?php

use App\Livewire\CheckList;
use App\Livewire\CreateUrl;
use App\Livewire\UrlList;
use Illuminate\Support\Facades\Route;

Route::get('/', CreateUrl::class)->name('url.store');
Route::get('/urls', UrlList::class)->name('url.index');
Route::get('/checks', CheckList::class)->name('checks');
