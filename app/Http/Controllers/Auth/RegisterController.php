<?php

namespace App\Http\Controllers\Auth;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'u_nombre' => ['required', 'string', 'max:255'],
            'u_apellido' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'u_fecha_nacimiento' => 'required',
            'u_sexo' => 'required',
        ]);
    }

    protected function create(array $data)
    {
        try {

            $u_nombre_usuario =  strtolower(str_replace(" ", ".", $data['u_nombre'].$data['u_apellido']));

            $data['confirmation_code'] =  Str::random(25);

            if($data['u_sexo'] == 'O'){
                $sexo = $data['u_sexo_p'];
            }else{
                $sexo = $data['u_sexo'];
            }

            $user =  User::create([
                'u_nombre' => $data['u_nombre'],
                'u_apellido' => $data['u_apellido'],
                'u_nombre_usuario' => $u_nombre_usuario ,
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'u_sexo' => $sexo,
                'u_fecha_nacimiento' => $data['u_fecha_nacimiento'],
                'u_tokens' => 0,
                'u_term_con' => 1,
                'confirmation_code' => $data['confirmation_code'],
            ]);

            // Send confirmation code
            Mail::send('emails.confirmation_code', $data, function($message) use ($data) {
                $message->to($data['email'], $data['u_nombre'])->subject('Por favor confirma tu correo');
            });

            return $user;
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function verify($code)
    {
        $user = User::where('confirmation_code', $code)->first();

        if (! $user)
            return redirect('/');

        $user->confirmed = true;
        $user->confirmation_code = null;
        $user->save();

        return redirect('/home')->with('notification', 'Has confirmado correctamente tu correo!');
    }
}
