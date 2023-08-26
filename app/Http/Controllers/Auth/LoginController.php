<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // ajuste nuevo
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        $remember = $request->filled('remember'); //  "Recuérdame" está marcado

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            if ($remember) {
                $user = Auth::user();
                $persistentToken = Str::random(40); // Generar un token seguro
                DB::table('persistent_sessions')
                    ->insert([
                        'user_id' => Auth::user()->id,
                        'token' => $persistentToken,
                        'expiration_time' => Carbon::now()->addDay(15)
                    ]);
                $encryptedToken = Crypt::encrypt($persistentToken); // Cifrar el token
                return $this->sendLoginResponse($request)->withCookie(Cookie::make('persistent_session_token', $encryptedToken, 15 * 24 * 60)); // 15 días
            }

            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }
    public function checkAuth(Request $request)
{
    if (Auth::check()) {
        return response()->json(['authenticated' => true]);
    } else {
        return response()->json(['authenticated' => false]);
    }
}
}
