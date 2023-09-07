<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostAction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostActionController extends Controller
{
    public function getLikes()
    {
        $post_like = DB::table('post_action')
            ->selectRaw('count(*) as like_count, poac_id_post')
            ->where('poac_action', 'like')
            ->groupBy('poac_id_post')
            ->get();

        $likes = [];

        foreach ($post_like as $post) {
            $likesT = $post->like_count;
            $likes[$post->poac_id_post] = $likesT;
        }

        return response()->json([
            'likes' => $likes,
        ]);
    }

    public function getComments()
    {

        $post_comment = DB::table('post_comment')
            ->selectRaw('count(*) as comment_count, poc_id_post')
            ->groupBy('poc_id_post')
            ->get();

        $comments = [];

        foreach ($post_comment as $comment) {
            $commentsT = $comment->comment_count;
            $comments[$comment->poc_id_post] = $commentsT;
        }

        return response()->json([
            'comments' => $comments,
        ]);
    }

    public function getFollows(Request $request)
    {
        $userid = $request->input('userid');

        $follows = DB::table('seguidores')
            ->where('seguidor_id_users', $userid)
            ->count();
        $followers = DB::table('seguidores')
            ->where('seguido_id_users', $userid)
            ->count();

        return response()->json(['follows' => $follows, 'followers' => $followers]);
    }

    public function postAction(Request $request)
    {
        $auth = $request->input('auth');
        $video = $request->input('video');

        $postAction = new PostAction();
        $postAction->poac_id_user = $auth;
        $postAction->poac_id_post = $video;
        $postAction->poac_action = 'like';
        $postAction->poac_timestamp = Carbon::now();

        $postAction->save();

        $likes = DB::table('post_action')->where('poac_id_post', $video)->where('poac_action', 'like')->count();

        return response()->json(['likes' => $likes]);
    }

    public function postActionDelete(Request $request)
    {
        $auth = $request->input('auth');
        $video = $request->input('video');

        DB::table('post_action')
            ->where('poac_id_user', $auth)
            ->where('poac_id_post', $video)
            ->delete();

        $likes = DB::table('post_action')->where('poac_id_post', $video)->where('poac_action', 'like')->count();

        return response()->json(['likes' => $likes]);
    }

    public function postEdit(Request $request)
    {
        $id = $request->input('id');
        $descripcion = $request->input('descripcion');

        $edit = DB::table('post_user')
            ->where('pu_id', $id)
            ->update([
                'pu_descripcion' => nl2br($descripcion),
            ]);

        if ($edit) {
            return response()->json(['mensaje' => 'actualizado']);
        } else {
            return redirect('/');
        }
    }

    public function notificaciones()
    {
        $contador = DB::table('post_action')
            ->select('poac_timestamp')
            ->where('poac_id_user', Auth::user()->id)
            ->where('poac_check', '0')
            ->count();
        return response()->json($contador);
    }

    public function obtenerNofificacionesComentarios()
    {
        $likes = DB::table('users')
            ->select('pu_id', 'u_nombre_usuario', 'u_img_profile', 'poac_id_user', 'pu_type', 'poac_id_post', 'poac_action', 'poac_timestamp', 'poac_check', 'users.id')
            ->join('post_action', 'users.id', '=', 'post_action.poac_id_user')
            ->join('post_user', 'post_action.poac_id_post', '=', 'post_user.pu_id')
            ->where('post_user.pu_id_user', Auth::user()->id)
            ->where('poac_id_user', '!=', Auth::user()->id)
            ->where('post_action.poac_action', 'like');

        $comment = DB::table('users')
            ->select('pu_id', 'u_nombre_usuario', 'u_img_profile', 'poac_id_user', 'pu_type', 'poac_id_post', 'poac_action', 'poac_timestamp', 'poac_check', 'users.id')
            ->join('post_action', 'users.id', '=', 'post_action.poac_id_user')
            ->join('post_user', 'post_action.poac_id_post', '=', 'post_user.pu_id')
            ->where('post_user.pu_id_user', Auth::user()->id)
            ->where('poac_id_user', '!=', Auth::user()->id)
            ->where('post_action.poac_action', 'comment');

        $mention = DB::table('users')
            ->select('pu_id', 'u_nombre_usuario', 'u_img_profile', 'poac_id_user', 'pu_type', 'poac_id_post', 'poac_action', 'poac_timestamp', 'poac_check', 'users.id')
            ->join('post_action', 'users.id', '=', 'post_action.poac_id_user')
            ->join('post_user', 'post_action.poac_id_post', '=', 'post_user.pu_id')
            ->where('poac_id_user', '=', Auth::user()->id)
            ->where('post_action.poac_action', 'mention');

        /*$likes = PostAction::where('poac_id_user', Auth::user()->id)
            ->where('poac_action', 'like');

        $comment = PostAction::where('poac_id_user', Auth::user()->id)
            ->where('poac_action', 'comment');

        $follow = PostAction::where('poac_id_user', Auth::user()->id)
            ->where('poac_action', 'follow');*/

        $notificaciones = $likes->union($comment)->union($mention)->orderBy('poac_timestamp', 'desc')->get();

        $notificaciones_count = DB::table('users')
            ->select('pu_id', 'u_nombre_usuario', 'u_img_profile', 'poac_id_user', 'pu_type', 'poac_id_post', 'poac_action', 'poac_timestamp', 'poac_check', 'users.id')
            ->join('post_action', 'users.id', '=', 'post_action.poac_id_user')
            ->join('post_user', 'post_action.poac_id_post', '=', 'post_user.pu_id')
            ->where('post_user.pu_id_user', Auth::user()->id)
            ->where('poac_id_user', '!=', Auth::user()->id)
            ->where('poac_check', 0)
            ->orderByDesc('poac_timestamp')
            ->get();
        return response()->json(['notificaciones' => $notificaciones, 'notificaciones_count' => $notificaciones_count]);
    }

    public function checkNotificacion(Request $request)
    {
        $user = $request->input('user');
        $check = DB::table('post_action')
            ->join('post_user', 'post_action.poac_id_post', '=', 'post_user.pu_id')
            ->where('post_user.pu_id_user', $user)
            ->where('poac_id_user', '!=', Auth::user()->id)
            ->update([
                'poac_check' => 1,
            ]);
        return response()->json(['check' => $check]);
    }

    public function tokens_inicio(Request $request)
    {
        $idVideo = $request->input('idVideo');
        $idUser = $request->input('idUser');

        $fecha = Carbon::now()->format('Y-m-d');

        $user = DB::table('users')->where('id', $idUser)->first();


        $consultaTokensDiario = DB::table('tokens_count')
            ->where('toc_post_video', $idVideo)
            ->where('toc_id_user', Auth::user()->id)
            ->get();

        if ($consultaTokensDiario->count() == 2) {
            return response()->json(['mensaje' => 'Token video recogido']);
        } else {
            DB::table('tokens_count')->insert([
                'toc_post_video' => $idVideo,
                'toc_id_user' => $idUser,
                'toc_id_por_video' => 0.5,
                'toc_fecha' => $fecha,
            ]);

            return response()->json(['mensaje' => $consultaTokensDiario->count()]);
        }
    }

    public function postDelete(Request $request)
    {
        $id = $request->input('id');

        $postId = DB::table('post_user')->where('pu_id', $id)->first();

        $postIdFiles = DB::table('post_user_files')->where('puf_id_post', $id)->get();

        if ($postIdFiles->count() > 0) {
            foreach ($postIdFiles as $pf) {
                DB::table('post_user_files')->where('puf_id_post', $postId->pu_id)->delete();
                if ($pf->puf_file != "") {
                    $path_info = pathinfo($pf->puf_file);
                    // Obtener el nombre del archivo
                    $extension = pathinfo($pf->puf_file, PATHINFO_EXTENSION);
                    $nombre_archivo = $path_info['basename'];
                    if ($extension == 'mp4') {
                        Storage::disk('s3')->delete('videos/' . $nombre_archivo);
                    } else {
                        Storage::disk('s3')->delete('imagenes/' . $nombre_archivo);
                    }
                }
            }
        }

        DB::table('post_user')
            ->where('pu_id', $postId->pu_id)
            ->delete();


        return response()->json(['mensaje' => 'Datos guardados exitosamente']);
    }

    public function getMuro()
    {
        $muros = DB::table('muro_users')
            ->join('users', 'muro_users.mure_id_users', '=', 'users.id')
            ->where('mure_id_users_publicando', Auth::user()->id)->get();
        foreach ($muros as $muro) {
            $muro->imagen_default = asset('images/3135768.png');
        }
        return response()->json($muros);
    }

    public function postMuro(Request $request)
    {
        $text = $request->input('text_muro');
        $userid = $request->input('userIdAuth');
        $userpubli = $request->input('userIdPubli');

        $inser = DB::table('muro_users')->insert([
            'mure_id_users' => $userid,
            'mure_id_users_publicando' => $userpubli,
            'mure_text' => $text,
        ]);
        return response()->json(['mensaje' => 'Datos guardados exitosamente']);
    }

    public function opinionDelete(Request $request)
    {
        $id = $request->input('id');
        $muro = DB::table('muro_users')->where('mure_id', $id)->first();
        DB::table('muro_users')
            ->where('mure_id', $id)
            ->delete();

        return response()->json(['mensaje' => 'Datos guardados exitosamente']);
    }

    public function getSugerenciasUlt()
    {
        $sugerencias = DB::table('users')
            ->select('id', 'u_img_profile', 'u_nombre_usuario', 'u_nombre', 'u_apellido')
            ->leftJoin('seguidores', function ($join) {
                $join->on('users.id', '=', 'seguidores.seguidor_id_users')
                    ->where('seguidores.seguidor_id_users', '!=', Auth::user()->id)
                    ->where('seguidores.seguido_id_users', '=', Auth::user()->id);
            })
            ->whereNull('seguidores.seguidor_id_users')
            ->where('users.id', '!=', Auth::user()->id)
            ->orderByDesc('users.created_at') // Ordenar por fecha de creación
            ->take(3) // Tomar los últimos 3 usuarios
            ->get();


        foreach ($sugerencias as $s) {
            $s->autid = Auth::user()->id;
            $s->icon = asset('images/icons/no-te-visitan.png');
            $s->icon_d = asset('images/3135768.png');
        }
        return response()->json($sugerencias);
    }

    public function eliminarComentario(Request $request)
    {
        $id = $request->input('id');
        $comment = DB::table('post_comment')->where('poc_id', $id)->first();
        if ($comment) {
            DB::table('post_comment')
                ->where('poc_id', $id)
                ->delete();
        }
        return response()->json(['mensaje' => 'Datos guardados exitosamente']);
    }

    public function getFollowing(Request $request)
    {
        $searchText = $request->input('searchText');
        $postId = $request->input('postId');

        $user = auth()->user();

        $searchFilter = str_replace("@", "", $searchText);

        $followings = $user->following()->where('u_nombre_usuario', 'LIKE', '%' . $searchFilter . '%')->get();

        return response()->json($followings);
    }

    public function postMentions(Request $request)
    {

        $userAuth = $request->input('authuser');
        $userMention = $request->input('inputValue');

        $usuario = str_replace("@", "", $userMention);

        $consultaUser = DB::table('users')->select('id')->where('u_nombre_usuario', $usuario)->first();

        $post = $request->input('post');

        DB::table('post_mentions')->insert([
            'pom_id_post' => $post,
            'pom_id_auth_user' => Auth::user()->id,
            'pom_id_user' => $consultaUser->id,
        ]);

        DB::table('post_action')->insert([
            'poac_id_post' => $post,
            'poac_id_user' => $consultaUser->id,
            'poac_action' => 'mention',
        ]);

        return response()->json($post);
    }
}
