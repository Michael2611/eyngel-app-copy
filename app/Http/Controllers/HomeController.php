<?php

namespace App\Http\Controllers;

use App\Models\PostUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function getVideo()
    {
        $publicaciones = DB::table('post_user')
            ->join('users', 'post_user.pu_id_user', '=', 'users.id')
            ->where('pu_extension', 'mp4')
            ->paginate(2);


        foreach ($publicaciones as $publicacion) {
            $publicacion->u_img_profile = asset($publicacion->u_img_profile);
            $publicacion->pu_file = asset($publicacion->pu_file);
            $publicacion->poster = asset('images/portada-video-inicio.png');
            $post_auth_like = DB::table('post_action')
                ->where('poac_id_user', Auth::user()->id)
                ->where('poac_id_post', $publicacion->pu_id)
                ->where('poac_action', 'like')
                ->first();
        }

        $id = Auth::user()->id;

        return response()->json($publicaciones);
    }

    public function index(Request $request)
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
            $anuncios = DB::table('anuncios')->where('a_estado', 1)->get();
            $usuario = DB::table('users')
                ->select(
                    'id',
                    'u_nombre',
                    'u_apellido',
                    'u_img_profile',
                    'u_nombre_usuario',
                    'u_fecha_nacimiento',
                    'u_descripcion_perfil',
                    'u_sexo',
                    'u_ciudad_residencia'
                )
                ->where('id', Auth::user()->id)
                ->first();

            $post_users = PostUser::with('media')->where('pu_tipo_vista', 'general')->orWhere('pu_tipo_vista', 'visitantes')->orderBy('pu_timestamp', 'desc')->get();

            foreach ($post_users as $post_user) {
                $post_user->pu_descripcion = $this->replaceUrlsWithLinks($post_user->pu_descripcion);
            }

            $paises = DB::table('pais')->select('pa_id', 'pa_nombre')->get();
            $celebraciones = DB::table('seguidores')
                ->select('u_nombre_usuario', 'u_img_profile', 'u_nombre', 'u_apellido')
                ->join('users', 'seguidores.seguido_id_users', 'users.id')
                ->where('seguidor_id_users', Auth::user()->id)
                ->where('seguido_id_users', '!=', Auth::user()->id)
                ->where('u_fecha_nacimiento', Carbon::now()->format('Y-m-d'))
                ->get();
            return view('home', compact('usuario', 'anuncios', 'paises', 'post_users', 'celebraciones'));
        } else {
            $anuncios = DB::table('anuncios')->where('a_estado', 1)->get();
            $post_users = PostUser::with('media')->where('pu_tipo_vista', 'general')->orderBy('pu_timestamp', 'desc')->get();
            $paises = DB::table('pais')->select('pa_id', 'pa_nombre')->get();
            $celebraciones = DB::table('seguidores')
                ->select('u_nombre_usuario', 'u_img_profile', 'u_nombre', 'u_apellido')
                ->join('users', 'seguidores.seguido_id_users', 'users.id')
                ->where('u_fecha_nacimiento', Carbon::now()->format('Y-m-d'))
                ->get();
            return view('home', compact('anuncios', 'paises', 'post_users', 'celebraciones'));
        }
    }

    public function visitando(Request $request)
    {

        $usuario = DB::table('users')
            ->select(
                'id',
                'u_nombre',
                'u_apellido',
                'u_img_profile',
                'u_nombre_usuario',
                'u_fecha_nacimiento',
                'u_descripcion_perfil',
                'u_sexo',
                'u_ciudad_residencia'
            )
            ->where('id', Auth::user()->id)
            ->first();

        $visitando = Auth::user()->followers->pluck('id');

        $post_users = PostUser::with('media')
            ->where(function ($query) use ($visitando) {
                $query->whereIn('pu_id_user', $visitando)
                    ->Where('pu_tipo_vista', 'visitantes');
            })
            ->orderBy('pu_timestamp', 'desc')
            ->get();

        $celebraciones = DB::table('seguidores')
            ->select('u_nombre_usuario', 'u_img_profile', 'u_nombre', 'u_apellido')
            ->join('users', 'seguidores.seguido_id_users', 'users.id')
            ->where('seguidor_id_users', Auth::user()->id)
            ->where('seguido_id_users', '!=', Auth::user()->id)
            ->where('u_fecha_nacimiento', Carbon::now()->format('Y-m-d'))
            ->get();

        return view('visitando', compact('visitando', 'post_users', 'usuario', 'celebraciones'));
    }

    public function replaceUrlsWithLinks($text)
    {
        return Str::of($text)->replaceMatches('/\b(https?:\/\/\S+)\b/', function ($match) {
            return '<a class="enlace-eyngel" href="' . $match[0] . '" target="_blank">' . $match[0] . '</a>';
        });
    }


    public function postSpecific($user, $video)
    {
        $usuario = DB::table('users')
            ->select('u_nombre_usuario', 'id')
            ->where('u_nombre_usuario', $user)
            ->first();

        $post = PostUser::with('media')->orderBy('pu_timestamp', 'desc')->where('pu_id', $video)->first();
        return view('post', compact('usuario', 'post'));
    }

    public function postViewUpload()
    {
        $usuario = DB::table('users')
            ->select('id', 'u_nombre_usuario', 'u_img_profile')
            ->where('id', Auth::user()->id)
            ->first();
        //$anuncios = DB::table('anuncios')->where('a_estado', 1)->get();
        return view('cargar-post', compact('usuario'));
    }

    public function politicaPrivacidad()
    {
        return view('privacidad-datos');
    }

    public function contacto()
    {
        return view('contacto');
    }

    public function settings()
    {
        $usuario = DB::table('users')
            ->select('id', 'u_nombre_usuario', 'u_img_profile')
            ->where('id', Auth::user()->id)->first();
        return view('settings.index', compact('usuario'));
    }

    public function settings_profile()
    {
        $usuario = DB::table('users')
            ->select('id', 'u_nombre', 'u_img_profile')
            ->where('id', Auth::user()->id)
            ->first();
        return view('settings.datos', compact('usuario'));
    }

    public function settings_password()
    {
        $usuario = DB::table('users')
            ->select('id', 'u_nombre', 'u_img_profile')
            ->where('id', Auth::user()->id)->first();
        return view('settings.password', compact('usuario'));
    }

    public function settings_verify_count()
    {
        $usuario = DB::table('users')
            ->select('id', 'u_nombre', 'u_img_profile')
            ->where('id', Auth::user()->id)
            ->first();
        $verificacion = DB::table('users_verify_count')
            ->select('uvc_id_users', 'uvc_file_pay', 'uv_pay_status', 'uvc_file_video', 'uvc_status')
            ->where('uvc_id_users', Auth::user()->id)
            ->first();
        return view('settings.verificacion', compact('usuario', 'verificacion'));
    }

    public function settings_create_bussines()
    {
        $usuario = DB::table('users')
            ->select('id', 'u_nombre', 'u_img_profile')
            ->where('id', Auth::user()->id)
            ->first();
        $paises = DB::table('pais')->select('pa_id', 'pa_nombre')->get();
        //$empresa = DB::table('t_empresa')->where('t_id_user_create', Auth::user()->id)->first();
        return view('settings.crear-tienda', compact('usuario', 'paises'));
    }

    public function settings_edit(Request $request)
    {
        $id = $request->input("id");
        $u_nombre_usuario = $request->input("u_nombre_usuario");
        $u_descripcion_perfil = nl2br($request->input("u_descripcion_perfil"));

        if ($id == Auth::user()->id) {
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update([
                    'u_nombre_usuario' => $u_nombre_usuario,
                    'u_descripcion_perfil' => $u_descripcion_perfil
                ]);
            return response()->json($u_nombre_usuario);
        } else {
            return response()->json($u_nombre_usuario);
        }
    }

    public function settings_edit_profile(Request $request)
    {
        $id = $request->input("id");
        $u_nombre = $request->input("u_nombre");
        $u_apellido = $request->input("u_apellido");
        $u_fecha_nacimiento = $request->input("u_fecha_nacimiento");
        $u_sexo = $request->input("u_sexo");
        $u_ciudad_residencia = $request->input('u_ciudad_residencia');
        $u_profesion = $request->input('u_profesion');

        if ($id == Auth::user()->id) {
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update([
                    'u_nombre' => $u_nombre,
                    'u_apellido' => $u_apellido,
                    'u_fecha_nacimiento' => $u_fecha_nacimiento,
                    'u_sexo' => $u_sexo,
                    'u_ciudad_residencia' => $u_ciudad_residencia,
                    'u_profesion' => $u_profesion,
                ]);
            return response()->json("mensaje", "ok");
        } else {
            return response()->json("mensaje", "error");
        }
    }

    public function crear_tienda(Request $request)
    {

        $t_nombre = $request->input("t_nombre");
        $t_eslogan = $request->input("t_eslogan");
        $t_descripcion = $request->input("t_descripcion");
        $t_direccion = $request->input("t_direccion");
        $t_telefono = $request->input('t_telefono');
        $t_correo = $request->input("t_correo");
        $t_img_logo = $request->file("t_img_logo");
        $t_enlace = $request->input("t_enlace");
        $t_id_pais = $request->input("t_id_pais");

        $filename = time() . '_' . $t_img_logo->getClientOriginalName();
        $extension = $t_img_logo->getClientOriginalExtension();

        if ($extension == 'jpg' || $extension == 'JPG' || $extension == 'png' || $extension == 'jpeg' || $extension == 'webp') {
            $ruta = 'images/tienda/logo/';
            $resizeImage = Image::make($t_img_logo)->resize(800, 600, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg', 80);
            $resizeImage->save($ruta . $filename);
        }

        DB::table('t_empresa')
            ->insert([
                't_nombre' => $t_nombre,
                't_eslogan' => $t_eslogan,
                't_descripcion' => $t_descripcion,
                't_direccion' => $t_direccion,
                't_telefono' => $t_telefono,
                't_correo' => $t_correo,
                't_img_logo' => $ruta . $filename,
                't_enlace' => $t_enlace,
                't_id_pais' => $t_id_pais,
                't_estado' => 1,
                't_id_user_create' =>  Auth::user()->id,
            ]);

        return response()->json("mensaje", 'ok');
    }

    public function editar_tienda(Request $request)
    {

        $empresa = DB::table('t_empresa')->where('t_id_user_create', Auth::user()->id)->first();

        $t_nombre = $request->input("t_nombre");
        $t_eslogan = $request->input("t_eslogan");
        $t_descripcion = $request->input("t_descripcion");
        $t_direccion = $request->input("t_direccion");
        $t_telefono = $request->input('t_telefono');
        $t_correo = $request->input("t_correo");
        $t_img_logo = $request->file("t_img_logo");
        $t_enlace = $request->input("t_enlace");
        $t_id_pais = $request->input("t_id_pais");

        if ($t_img_logo == "") {
            $file = $empresa->t_img_logo;
        }

        $filename = time() . '_' . $t_img_logo->getClientOriginalName();
        $extension = $t_img_logo->getClientOriginalExtension();

        if ($extension == 'jpg' || $extension == 'JPG' || $extension == 'png' || $extension == 'jpeg' || $extension == 'webp') {
            $ruta = 'images/tienda/logo/';
            $resizeImage = Image::make($t_img_logo)->resize(800, 600, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg', 80);
            $resizeImage->save($ruta . $filename);
            $file = $ruta . $filename;
        }

        DB::table('t_empresa')
            ->where('t_id_user_create', Auth::user()->id)
            ->update([
                't_nombre' => $t_nombre,
                't_eslogan' => $t_eslogan,
                't_descripcion' => $t_descripcion,
                't_direccion' => $t_direccion,
                't_telefono' => $t_telefono,
                't_correo' => $t_correo,
                't_img_logo' => $file,
                't_enlace' => $t_enlace,
                't_id_pais' => $t_id_pais,
            ]);

        return response()->json("mensaje", 'ok');
    }

    public function store_verify_pay(Request $request)
    {

        $idUser = Auth::user()->id;
        $filePDF = $request->file('documento_ID');

        $namePDF = time() . ' - ' . $filePDF->getClientOriginalName();

        $rutaCarpeta = "verify_count/";
        $nombreCarpeta = Auth::user()->u_nombre_usuario . '_' . Auth::user()->id;
        if (!is_dir($rutaCarpeta . $nombreCarpeta,)) {
            if (mkdir($rutaCarpeta . $nombreCarpeta, 0755)) {
                $rutaDocumentos = "verify_count/" . $nombreCarpeta . "/";

                $filePDF->move($rutaDocumentos, $namePDF);

                $insert = DB::table('users_verify_count')
                    ->insert([
                        'uvc_id_users' => $idUser,
                        'uvc_file_pay' => $rutaDocumentos . $namePDF,
                    ]);

                $mensaje = "Su solicitud comprobante ha sido cargado, validaremos la información correspondiente.";

                if ($insert) {
                    return redirect('/settings/verify-count');
                } else {
                    return back();
                }
            }
        }
    }

    public function store_verify_count(Request $request)
    {

        $idUser = Auth::user()->id;
        $fileVIDEO = $request->file('video_presentacion');

        $nameVIDEO = time() . ' - ' . $fileVIDEO->getClientOriginalName();


        $nombreCarpeta = Auth::user()->u_nombre_usuario . '_' . Auth::user()->id;
        $rutaCarpeta = "verify_count/" . $nombreCarpeta . "/";
        if (!is_dir($rutaCarpeta . $nombreCarpeta,)) {
            if (mkdir($rutaCarpeta . $nombreCarpeta, 0755)) {
                $rutaDocumentos = "verify_count/" . $nombreCarpeta . "/";
                $fileVIDEO->move($rutaDocumentos, $nameVIDEO);

                $update = DB::table('users_verify_count')
                    ->where('uvc_id_users', Auth::user()->id)
                    ->update([
                        'uvc_file_video' => $rutaDocumentos . $nameVIDEO,
                        'uvc_status' => 1
                    ]);

                $mensaje = "Su solicitud ha sido enviada, daremos respuesta lo más pronto posible.";

                if ($update) {
                    return redirect('/settings/verify-count');
                } else {
                    return back();
                }
            }
        }
    }

    public function cerrar_sesion()
    {
        Auth::logout();
        return redirect('/');
    }
}
