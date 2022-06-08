<?php
/**
 * Author: Larissa De Barros
 * Date: 30.05.2022
 * Description: Checks if the authenticated user is an administrator
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class MustBeAdmin
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

        if (!(auth()->user()?->is_admin)) 
        {
            //returns a 403 error 
            abort(HttpFoundationResponse::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
