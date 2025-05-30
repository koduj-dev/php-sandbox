<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::prefix('books')
    ->name('books.')
    ->controller(BookController::class)
    ->group(function () {

        Route::get('/', 'index')->name('index');
        Route::get("/create", "create")->name("create");
        Route::get("/edit/{book}", "edit")->name("edit");
        Route::post("/store/{book?}", "store")->name("store");
    });