<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/contattaci', [PublicController::class, 'contactForm'])->name('contact');
Route::post('/contattaci', [PublicController::class, 'sendContact'])->name('contact.send');

// Rotte pubbliche (lista articoli)
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

// Rotte protette (create DEVE stare prima di {article})
Route::middleware('auth')->group(function () {
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::patch('/articles/{article}', [ArticleController::class, 'update']);
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});

// Rotta pubblica di dettaglio (va messa DOPO /articles/create)
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');