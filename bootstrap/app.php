<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->validateCsrfTokens(except: [
            'api/*',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );

        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\HttpException $e, Request $request) {
            if ($e->getStatusCode() === 419) {
                if ($request->expectsJson() || $request->is('api/*')) {
                    return response()->json([
                        'message' => 'Your security token has expired. Please refresh the page and try again.',
                    ], 419);
                }

                return redirect()->route('login')
                    ->withInput($request->except('password', '_token'))
                    ->with('error', 'Your session expired due to inactivity. A fresh session has been started — please sign in again.');
            }
        });
    })->create();
