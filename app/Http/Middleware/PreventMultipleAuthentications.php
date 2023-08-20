<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Factory as AuthFactory;

class PreventMultipleAuthentications
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    protected $auth;

    public function __construct(AuthFactory $auth){
        $this->auth = $auth;
    }

    public function handle(Request $request, Closure $next)
    {

        if($this->auth->guard()->check() && $this->auth->guard()->user()->hasActiveSession()){
            $this->auth->guard()->user()->invalidateOtherSessions();
            throw new AuthenticationException('Tu sesión ha sido cerrada porque has iniciado sesión en otro dispositivo');
        }


        return $next($request);
    }
}
