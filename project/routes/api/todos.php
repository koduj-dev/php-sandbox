<?php

use App\Http\Controllers\Api\TodoController;
use Illuminate\Support\Facades\Route;
use App\Enums\TodoFilter;

Route::middleware('auth:sanctum')
    ->prefix('todos')
    ->controller(TodoController::class)
    ->group(function () {
        Route::get('/{filter?}', 'index')
            ->where('filter', implode('|', array_column(TodoFilter::cases(), 'value')));

        Route::get('/{todo}', 'show');
        Route::post('/', 'create');
        Route::delete('/{todo}', 'delete');
        Route::patch('/{todo}', 'update');
    });
