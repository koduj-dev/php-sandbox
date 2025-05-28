<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/book/{id}', function ($id) {
    return $id;
});

Route::fallback(function () {
    return "ERR 404 " . request()->getUri();
});