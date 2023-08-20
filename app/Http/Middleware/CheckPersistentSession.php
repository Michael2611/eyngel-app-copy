<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckPersistentSession
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
        if (!Auth::check() && $request->hasCookie('persistent_session_token')) {
            $token = $request->cookie('persistent_session_token');
            $user = DB::table('users')
                ->whereHas('persistent_sessions', function ($query) use ($token) {
                    $query->where('token', $token)
                        ->where('expiration_time', '>', now());
                })
                ->first();
            if ($user) {
                Auth::login($user);
            }
        }

        return $next($request);
    }
}
