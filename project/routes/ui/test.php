<?php

use Illuminate\Support\Facades\Route;

Route::get('/nahodne-cislo', function () {
    return rand();
});

Route::get('/nahodne-pole', function () {
    return ['klic' => 'hodnota'];
});

Route::get('/cislo/{min}/{max?}', function($min, $max = 100) {
    return rand($min, $max);
});

Route::get('/post/{slug}', function ($slug) {
    return $slug;
})->whereNumber('slug');

Route::get('/post/s/{slug}', function ($slug) {
    return $slug;
})->whereAlpha('slug');

Route::get('/post/an/{slug}', function ($slug) {
    return $slug;
})->whereAlphaNumeric('slug');

Route::get('/post/reg/{slug}', function ($slug) {
    return $slug;
})->where('slug', '[a-z0-9-]+');

Route::get('/post/list/{status}/', function ($status) {
    return $status;
})->whereIn('status', ['published', 'archived', 'deleted']);
