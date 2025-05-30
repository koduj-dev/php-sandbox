<?php

use App\Http\Middleware\UserRoleAccessMiddleware;
use App\Listeners\ErrorHandler;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withBindings([
        ExceptionHandler::class => ErrorHandler::class
    ])
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias(['role-access-control' => UserRoleAccessMiddleware::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
