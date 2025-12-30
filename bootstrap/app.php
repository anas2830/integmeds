<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AdminMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(\App\Http\Middleware\SecurityHeader::class);
        $middleware->alias([
            'auth.user' => UserMiddleware::class,
            'auth.admin' => AdminMiddleware::class
        ]);
        $middleware->validateCsrfTokens(except: [
            'success',
            'fail',
            'cancel',
            'ipn'
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        
    })->create();
