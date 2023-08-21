<?php

namespace App\Http\Controllers;

use App\Models\PostUser;
use App\Models\PostUserFiles;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use FFMpeg;
use FFMpeg\Filters\Video\VideoFilters;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;

class UsuarioController extends Controller
{
    public function usuario($nombre)
    {
        if (Auth::check()) {
            $usuario = DB::table('users')
                ->select('id', 'u_nombre', 'u_apellido', 'u_profesion', 'u_nombre_usuario', 'email', 'u_descripcion_perfil', 'u_sexo', 'u_ciudad_residencia', 'u_fecha_nacimiento', 'u_estado', 'u_img_profile')
                ->where('u_nombre_usuario', $nombre)
                ->first();
            $post_users = PostUser::with('media')->orderBy('pu_timestamp', 'desc')->where('pu_id_user', $usuario->id)->get();
            $anuncios = DB::table('anuncios')
                ->select('a_descripcion')
                ->where('a_estado', 1)
                ->get();
            $tocando_count = DB::table('seguidores')
                ->select('u_nombre_usuario', 'u_img_profile', 'u_nombre', 'u_apellido')
                ->join('users', 'seguidores.seguidor_id_users', 'users.id')
                ->where('seguido_id_users', Auth::user()->id)
                ->get();
            $tocados_count = DB::table('seguidores')
                ->select('u_nombre_usuario', 'u_img_profile', 'u_nombre', 'u_apellido')
                ->join('users', 'seguidores.seguido_id_users', 'users.id')
                ->where('seguidor_id_users', Auth::user()->id)
                ->where('seguido_id_users', '!=', Auth::user()->id)
                ->get();
            $tienda = DB::table('t_empresa')->where('t_id_user_create', Auth::user()->id)->get();
            $verificado = DB::table('users_verify_count')->where('uvc_id_users', $usuario->id)->first();
            return view('perfil', compact('usuario', 'post_users', 'anuncios', 'tocando_count', 'tocados_count', 'tienda', 'verificado'));
        } else {
            $usuario = DB::table('users')
                ->select('id', 'u_nombre', 'u_apellido', 'u_profesion', 'u_nombre_usuario', 'email', 'u_descripcion_perfil', 'u_sexo', 'u_ciudad_residencia', 'u_fecha_nacimiento', 'u_estado', 'u_img_profile')
                ->where('u_nombre_usuario', $nombre)
                ->first();
            $post_users = PostUser::with('media')->orderBy('pu_timestamp', 'desc')->where('pu_id_user', $usuario->id)->get();
            return view('perfil', compact('usuario', 'post_users'));
        }
    }

    public function usuario_actualizar_datos(Request $request)
    {
        $id = $request->get('id');
        $idE = Crypt::decrypt($id);

        $actualizar = User::find($idE);

        $u_nombre_usuario = strtolower(str_replace(' ', '.', $request->get('u_nombre') . $request->get('u_apellido')));


        if ($request->get('u_nombre_usuario') != "") {
            $consultaUsuario = DB::table('users')
                ->select('u_nombre_usuario')
                ->where('u_nombre_usuario', $request->get('u_nombre_usuario'))
                ->get();
            $u_nombre_usuario = $request->get('u_nombre_usuario');
        } else {
            $consultaUsuario = DB::table('users')
                ->select('u_nombre_usuario')
                ->where('u_nombre_usuario', $u_nombre_usuario)
                ->get();
        }

        if ($consultaUsuario->count() > 0) {
            $u_nombre_usuario = $u_nombre_usuario . $consultaUsuario->count();
        } else {
            $u_nombre_usuario = $u_nombre_usuario;
        }

        $actualizar->u_nombre = $request->get('u_nombre');
        $actualizar->u_apellido = $request->get('u_apellido');
        $actualizar->u_nombre_usuario = $u_nombre_usuario;
        $actualizar->u_fecha_nacimiento = $request->get('u_fecha_nacimiento');
        $actualizar->u_descripcion_perfil = $request->get('pu_descripcion');
        $actualizar->u_ciudad_residencia = $request->get('u_ciudad_residencia');

        $actualizar->save();

        return redirect('/');
    }

    public function actualizar_usuario_pass(Request $request)
    {

        $id = $request->input('id');

        $usuario = DB::table('users')
            ->where('id', $id)
            ->first();

        if (Hash::check($request->input('u_contra_actual'), $usuario->password)) {
            if ($request->input('u_contra_nueva') == $request->input('u_contra_nueva_confirm')) {
                DB::table('users')
                    ->where('id', $id)
                    ->update([
                        'password' => Hash::make($request->input('u_contra_nueva')),
                    ]);

                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/login');
            }
        } else {
            return response()->json("error");
        }
    }

    public function actualizar_usuario_email(Request $request, $id)
    {
        $datos = DB::table('users')
            ->select('id', 'email')
            ->where('id', $id)
            ->first();
        if ($request->get('email') == $datos->email) {
            return redirect()->back();
        } else {
            DB::table('users')
                ->where('id', $id)
                ->update([
                    'email' => $request->get('email'),
                ]);
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login')->with('success', 'Correo electronico actualizado, su sesión se ha cerrado por seguridad');
        }
    }

    public function actualizar_usuario_estado(Request $request, $id)
    {
        if ($request->get('u_estado') == 1) {
            $estado_new = 0;
        } else {
            $estado_new = 1;
        }
        DB::table('users')
            ->where('id', $id)
            ->update([
                'u_estado' => $estado_new,
            ]);
        return redirect()
            ->back()
            ->with('success', 'Estado actualizado');
    }

    /*eyngel*/

    public function post_store(Request $request)
    {
        if ($request->hasFile('pu_file') == '' && $request->get('pu_descripcion') == '') {
            $message = 'Es necesario agregar descripción o cargar un archivo para registrar su publicación';
            return back()->with('message', $message);
        } else if ($request->hasFile('pu_file')) {

            $file = $request->file('pu_file');

            foreach ($file as $files) {
                $extension = $files->getClientOriginalExtension();
                if ($extension == 'jpg' || $extension == 'JPG' || $extension == 'png' || $extension == 'jpeg') {
                    $type = 'img';
                } else if ($extension == 'mp4') {
                    $type = 'movie';
                }
            }

            $pu_id_user = Auth::user()->id;
            $pu_descripcion = nl2br($request->get('pu_descripcion'));

            $postUser = new PostUser();
            $postUser->pu_id_user = $pu_id_user;
            $postUser->pu_descripcion = $pu_descripcion;
            $postUser->pu_timestamp = Carbon::now();
            $postUser->pu_type = $type;
            $postUser->save();

            foreach ($file as $files) {
                $filename = time() . '-' . $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                if ($extension == 'jpg' || $extension == 'JPG' || $extension == 'png' || $extension == 'jpeg') {
                    $ruta = 'eyngel-post/images/';
                    $resizeImage = Image::make($files)->resize(600, 500, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->encode('jpg', 60);
                    $resizeImage->save($ruta . $filename);
                    $type = 'img';
                } else if ($extension == 'mp4') {
                    $ruta = 'eyngel-post/videos/';
                    $files->move($ruta, $filename);
                    $type = 'movie';
                }
                $postUserFiles = new PostUserFiles();
                $postUserFiles->puf_id_post = $postUser->pu_id;
                $postUserFiles->puf_file = $ruta . $filename;
                $postUserFiles->puf_extension = $extension;
                $postUserFiles->save();
            }
        } else {
            $pu_id_user = Auth::user()->id;
            $pu_descripcion = nl2br($request->get('pu_descripcion'));

            $postUser = new PostUser();
            $postUser->pu_id_user = $pu_id_user;
            $postUser->pu_descripcion = $pu_descripcion;
            $postUser->pu_timestamp = Carbon::now();
            $postUser->pu_type = 'hilo';
            $postUser->save();
        }
        return redirect('/')->with('success', 'Task Created Successfully!');
    }

    public function seguirUsuario(Request $request)
    {
        $userAuth = $request->input('userAuth');
        $userFollow = $request->input('userFollow');

        DB::table('seguidores')->insert([
            'seguido_id_users' => $userAuth,
            'seguidor_id_users' => $userFollow,
            'seguidor_timestamp' => Carbon::now(),
        ]);

        DB::table('post_action')->insert([
            'poac_id_user' => $userAuth,
            'poac_id_user_vistando' => $userFollow,
            'poac_action' => 'like',
            'poac_timestamp' => Carbon::now(),
        ]);

        $follows = DB::table('seguidores')
            ->where('seguidor_id_users', $userFollow)
            ->count();

        return response()->json(['follows' => $follows]);
    }

    public function eliminarUsuario(Request $request)
    {
        $userAuth = $request->input('userAuth');
        $userFollow = $request->input('userFollow');

        $consulta_seguidor = DB::table('seguidores')
            ->where('seguido_id_users', $userAuth)
            ->where('seguidor_id_users', $userFollow)
            ->first();

        if ($consulta_seguidor) {
            DB::table('seguidores')
                ->where('seguido_id_users', $userAuth)
                ->where('seguidor_id_users', $userFollow)
                ->delete();

            DB::table('post_action')
                ->where('poac_id_user', $userAuth)
                ->where('poac_id_user_vistando', $userFollow)
                ->delete();

            $follows = DB::table('seguidores')
                ->where('seguidor_id_users', $userFollow)
                ->count();
        }

        return response()->json(['follows' => $follows]);
    }

    public function postComment(Request $request)
    {
        $id = $request->input('id');
        $user = $request->input('user');
        $comment = $request->input('comment');

        DB::table('post_comment')->insert([
            'poc_id_post' => $id,
            'poc_id_user' => $user,
            'poc_comment' => $comment,
            'poc_timestamp' => Carbon::now(),
        ]);

        DB::table('post_action')->insert([
            'poac_id_user' => $user,
            'poac_id_post' => $id,
            'poac_action' => 'comment',
            'poac_timestamp' => Carbon::now(),
        ]);

        $comment_count = DB::table('post_comment')
            ->where('poc_id_post', $id)
            ->count();

        return response()->json(['comment_count' => $comment_count]);
    }

    public function cambiarFotoPerfil(Request $request)
    {
        if ($request->hasFile('img-profile')) {

            $img_profile = DB::table('users')->where('u_img_profile', Auth::user()->u_img_profile)->first();

            if ($img_profile->u_img_profile != "") {
                unlink(Auth::user()->u_img_profile);
            }

            $imagen = $request->file('img-profile');
            $ruta = 'images/img-profile-eyngel/';
            $filename = Auth::user()->u_nombre_usuario . '-' . $imagen->getClientOriginalName();
            $resizeImage = Image::make($imagen)->resize(600, 500, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg', 90);
            $resizeImage->save($ruta . $filename);
        }
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
                'u_img_profile' => $ruta . $filename,
            ]);
        return back();
    }

    public function eliminarFotoPerfil(Request $request)
    {
        $filePath = Auth::user()->u_img_profile;
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
                'u_img_profile' => '',
            ]);
        unlink($filePath);
        return back();
    }

    public function infoMonetizacion($nombre)
    {
        $usuario = DB::table('users')
            ->select('id', 'u_nombre_usuario', 'email', 'u_descripcion_perfil', 'u_sexo', 'u_ciudad_residencia', 'u_fecha_nacimiento', 'u_estado', 'u_img_profile')
            ->where('u_nombre_usuario', $nombre)
            ->first();
        $tocando_count = DB::table('seguidores')
            ->select('u_nombre_usuario', 'u_img_profile')
            ->join('users', 'seguidores.seguidor_id_users', 'users.id')
            ->where('seguidor_id_users', $usuario->id)
            ->get();
        $tokensCount = DB::table('tokens_count')
            ->join('post_user', 'tokens_count.toc_post_video', '=', 'post_user.pu_id')
            ->where('pu_id_user', Auth::user()->id)
            ->get();
        return view('monetizacion.monetizacion', compact('tocando_count', 'tokensCount', 'usuario'));
    }

    public function eliminarCuenta(Request $request)
    {
        $id = Auth::user()->id;

        $data = DB::table('users')->where('id', $id);

        if ($data) {
            DB::table('post_user')
                ->where('pu_id_user', $id)
                ->delete();

            DB::table('post_comment')
                ->where('poc_id_user', $id)
                ->delete();

            DB::table('tokens_count')
                ->where('toc_id_user', $id)
                ->delete();

            DB::table('seguidores')
                ->where('seguido_id_users', $id)
                ->delete();

            DB::table('post_action')
                ->where('poac_id_user', $id)
                ->delete();

            DB::table('users_verify_count')
                ->where('uvc_id_users', $id)
                ->delete();

            DB::table('persistent_sessions')
                ->where('user_id', $id)
                ->delete();

            $data->delete();
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        } else {
            return back();
        }
    }

    public function postInfo(Request $request)
    {
        $id = $request->input('id');
        $postInfo = DB::table('post_user')
            ->join('users', 'post_user.pu_id_user', '=', 'users.id')
            ->where('pu_id', $id)
            ->get();
        return response()->json($postInfo);
    }

    public function postViewComment(Request $request)
    {
        $id = $request->input('id');
        $postViewComment = DB::table('post_comment')
            ->select('id', 'u_nombre_usuario', 'poc_id', 'poc_comment', 'poc_timestamp', 'u_img_profile')
            ->join('users', 'post_comment.poc_id_user', '=', 'users.id')
            ->where('poc_id_post', $id)
            ->orderBy('poc_timestamp', 'desc')
            ->get();

        return response()->json($postViewComment);
    }

    public function buscando(Request $request)
    {
        $usuario = DB::table('users')
            ->select('id', 'u_nombre', 'u_apellido', 'u_nombre_usuario', 'email', 'u_descripcion_perfil', 'u_sexo', 'u_ciudad_residencia', 'u_fecha_nacimiento', 'u_estado', 'u_img_profile')
            ->where('id', Auth::user()->id)
            ->first();

        $q = $request->get('q');

        $qf = trim($q);

        if ($qf == '') {
            return back();
        } else {
            $results = DB::table('users')
                ->select('u_img_profile', 'u_nombre_usuario', 'u_nombre', 'u_apellido', 'u_descripcion_perfil', 'u_profesion')
                ->where('u_nombre', 'LIKE', '%' . $qf . '%')
                ->orWhere('u_apellido', 'LIKE', '%' . $qf . '%')
                ->orWhere('u_nombre_usuario', 'LIKE', '%' . $qf . '%')
                ->get();

            return view('buscar-usuario', compact('results', 'qf', 'usuario'));
        }
    }

    /*Fin*/
}
