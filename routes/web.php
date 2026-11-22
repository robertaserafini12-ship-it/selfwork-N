<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/contattaci', [PublicController::class, 'contactForm'])->name('contact');
Route::post('/contattaci', [PublicController::class, 'sendContact'])->name('contact.send');

Route::resource('articles', ArticleController::class);