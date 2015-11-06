<?php
namespace App\Http\Middleware;

use Closure;
use Session;
use Request;

class MemberAuthenticationMiddleware
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

        $user = Session::get('auth_user');
        if(!$user || !(\Auth::check()))
        {
            Session::put('url.intended',Request::url());
            return redirect('login');
        }

        return $next($request);
    }
}
