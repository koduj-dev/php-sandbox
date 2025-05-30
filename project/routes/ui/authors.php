<?php

use App\Enums\UserRole;
use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;

Route::prefix('authors')
    ->name('authors.')
    ->controller(AuthorController::class)
    ->group(function () {

        Route::get("/", "index")->name("index");

        Route::middleware(['auth', 'role-access-control:' . UserRole::AuthorAdmin->value])->group(function () {
            Route::get("/create", "create")->name("create");
            Route::get("/edit/{author}", "edit")->name("edit");
            Route::post("/store/{author?}", "store")->name("store");
        });
    });