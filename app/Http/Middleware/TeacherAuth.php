<?php

namespace App\Http\Middleware;

use Closure;

class TeacherAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!session()->has('t_id')){
            return redirect('teacher.login.view');
        }
        return $next($request);
    }
}
