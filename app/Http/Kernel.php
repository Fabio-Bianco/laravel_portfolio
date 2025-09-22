<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\TrustProxies::class,
        \App\Http\Middleware\RedirectIfAuthenticated::class,
        \App\Http\Middleware\EncryptCookies::class,
        \App\Http\Middleware\AddQueuedCookiesToResponse::class,
        \App\Http\Middleware\StartSession::class,
        \Illuminate\Session\Middleware\AuthenticateSession::class,
        \App\Http\Middleware\SetCacheHeaders::class,
        \App\Http\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
        \App\Http\Middleware\SubstituteBindings::class,
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth'     => \App\Http\Middleware\Authenticate::class,
        'is_admin' => \App\Http\Middleware\IsAdmin::class,
        'bindings' => \App\Http\Middleware\SubstituteBindings::class,
        'can' => \App\Http\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
    ];

    /**
     * The application's middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \App\Http\Middleware\AddQueuedCookiesToResponse::class,
            \App\Http\Middleware\StartSession::class,
            \Illuminate\Session\Middleware\AuthenticateSession::class,
            \App\Http\Middleware\SetCacheHeaders::class,
            \App\Http\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \App\Http\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:api',
            'bindings',
        ],
    ];

    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middlewareAliases = [
        'auth'     => \App\Http\Middleware\Authenticate::class,
        'is_admin' => \App\Http\Middleware\IsAdmin::class,
    ];
}

