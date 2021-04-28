<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class ProfessionalAuthenticate extends Middleware
{
    protected function authenticate($request, array $guards)
    {
        if ($this->auth->guard('professional')->check()) {
            return $this->auth->shouldUse('professional');
        }
        $this->unauthenticated($request, ['professional']);
    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
    }
}
