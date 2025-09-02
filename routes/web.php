<?php

use App\Http\Controllers\ShortLinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShortLinkController::class, 'index'])->name('shorten.index');

Route::resource('shorten', ShortLinkController::class);

Route::get('/{slug}', [ShortLinkController::class, 'redirect'])->name('shorten.redirect');