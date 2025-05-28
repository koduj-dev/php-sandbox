<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::prefix('todos')
    ->name('todos.')
    ->controller(TodoController::class)
    ->group(function () {

    Route::get('/', '__invoke')->name('index');
    Route::get('/list', 'list')->name('list');
    Route::get('/store', 'store')->name('store');
    Route::get('/{id}', 'todo')->name('todo');
    
    Route::fallback(function () {
        return "ERR 404 TODOS";
    });
});