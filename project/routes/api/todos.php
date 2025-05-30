<?php

use App\Http\Controllers\Api\TodoController;
use Illuminate\Support\Facades\Route;

Route::prefix('todos')
    ->controller(TodoController::class)
    ->group(function () {

        Route::get('/', 'index');
        Route::get('/item/{todo}', 'show');

    });