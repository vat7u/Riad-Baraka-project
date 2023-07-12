<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Employee;
class MustBeEmployee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

            if(auth()->guest()){
                abort(Response::HTTP_FORBIDDEN);
            }

            $employees = Employee::all();
            $user = auth()->user();

            foreach($employees as $employee){
                if($employee->user_id == $user->id){ 
                    return $next($request);
                }
            }
            abort(Response::HTTP_FORBIDDEN);
        
    }
}
