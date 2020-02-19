<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class student
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (empty(Session::has('student_session'))) {
            return redirect('student/login');
        }
        return $next($request);
    }
}
