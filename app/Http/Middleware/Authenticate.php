<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (\Auth::guard('employee')->check()) {
            return route('employee.guest.login');
        } elseif (\Auth::guard('client')->check()) {
//            Client Route Baxck
        } else {
            return route('login');
        }
    }
}
