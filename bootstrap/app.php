<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CheckAdmin;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => CheckAdmin::class, // Registering the CheckAdmin middleware
        ]);

        // Optionally, you can append or prepend middleware to the global stack
        // $middleware->append(CheckAdmin::class);
        // $middleware->prepend(CheckAdmin::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
