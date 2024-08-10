<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        using: function () {
            // các route trong mảng là demo ae cứ tạo file route theo cấu trúc đó
            $adminRoute = [
                'profile-admin.php',
              
            ];
            $userRoute = [
                'profile-user.php',
        
            ];
            $ownersRoute = [
                'profile-owners.php',
        
            ];
            foreach ($adminRoute as $route) {
                Route::middleware('web')->prefix('admin')->name('admin.')->group(base_path("routes/admin/{$route}"));
            }
            foreach ($userRoute as $route) {
                Route::middleware('web')->prefix('')->group(base_path("routes/client/{$route}"));
            }
            foreach ($ownersRoute as $route) {
                Route::middleware('web')->prefix('')->group(base_path("routes/owners/{$route}"));
            }
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
