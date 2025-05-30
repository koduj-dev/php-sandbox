<?php

use App\Enums\UserRole;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::prefix('todos')
    ->name('todos.')
    ->middleware(['auth', 'role-access-control:' . UserRole::Todo->value])
    ->controller(TodoController::class)
    ->group(function () {

    Route::get('/', '__invoke')->name('index');
    //  nedoporučuje se!!
    Route::get('/complete/{todo}', 'complete')->name('complete');
    Route::get('/delete/{todo}', 'delete')->name('delete');

    Route::post('/', 'store')->name('store');


        /*
    Route::get('/list', 'list')->name('list');
    Route::get('/store', 'store')->name('store');
    Route::get('/{todo}', 'todo')->name('todo');
    Route::get('/user/{user}', 'byUser')->name('user');
    Route::get('/user/{user}/todo/{todo}', function (User $user, Todo $todo) {
        dump($user);
        dd($todo);
    }); */


    /*
    Route::scopeBindings()->get('/user/{user}/todo/{todo}', function (User $user, Todo $todo) {
        dump($user);
        dd($todo);
    }); */

    /*
    Route::fallback(function () {
        return "ERR 404 TODOS";
    }); */
});
