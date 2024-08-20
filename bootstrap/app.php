<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias(['auth.type' => App\Http\Middleware\CheckUser::class]);
        $middleware->appendToGroup('web',App\Http\Middleware\UpdateUserLastActiveAt::class);
        $middleware->appendToGroup('web',App\Http\Middleware\MarkNotificationAsRead::class);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();