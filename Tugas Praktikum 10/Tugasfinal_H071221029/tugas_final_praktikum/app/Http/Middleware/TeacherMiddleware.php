<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TeacherMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if ($user && ($user->role == 'teacher' || $user->role == 'admin')) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
