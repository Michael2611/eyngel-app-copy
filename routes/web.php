<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/para-ti');
    } else {
        return redirect('/para-ti');
    }
})->name('home');

Route::get('/offline', function () {
    return view('vendor/laravelpwa/offline');
});


Route::get('/upload', [UsuarioController::class, '__invoke']);

Route::get('/login', function (Request $request) {
    if (Auth::check()) {
        $user = DB::table('users')->where('id', Auth::user()->id)->first();
        return view('home', compact('user'));
    } else {
        $ip = $request->ip();
        return view('auth.login', compact('ip'));
    }
})->name('login');

Auth::routes(['verify' => true]);
// E-mail verification
Route::get('/register/verify/{code}', [App\Http\Controllers\RegisterController::class, 'verify']);

Route::prefix('admin')
    ->middleware(['auth', 'isAdmin'])
    ->group(function () {

        /* Anuncios */
        Route::get('/anuncio', [App\Http\Controllers\AnuncioController::class, 'index']);
        Route::get('/crear-anuncio', [App\Http\Controllers\AnuncioController::class, 'create']);
        Route::delete('/eliminar-anuncio/{id}', [App\Http\Controllers\AnuncioController::class, 'destroy']);
        Route::post('/anuncios-store', [App\Http\Controllers\AnuncioController::class, 'store'])->name('anuncios.store');
        Route::get('/anuncios/{id}', [App\Http\Controllers\AnuncioController::class, 'edit'])->name('anuncios.edit');
        Route::put('/anuncios-actualizar/{id}', [App\Http\Controllers\AnuncioController::class, 'update'])->name('anuncios.update');

        /* Peliculas */
        Route::get('/crear-pelicula', [App\Http\Controllers\MovieController::class, 'create']);
        Route::delete('/eliminar-pelicula/{id}', [App\Http\Controllers\MovieController::class, 'destroy']);
        Route::post('/pelicula-store', [App\Http\Controllers\MovieController::class, 'store'])->name('movies.store');
        Route::get('/pelicula/{id}', [App\Http\Controllers\MovieController::class, 'edit'])->name('movies.edit');
        Route::put('/pelicula-actualizar/{id}', [App\Http\Controllers\MovieController::class, 'update'])->name('movies.update');
    });

Route::get('/politicas-eyngel', function () {
    return view('politica-eyngel');
});


Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/post', [App\Http\Controllers\HomeController::class, 'getPost']);
    Route::put('/actualizar-politica', [App\Http\Controllers\HomeController::class, 'actualizarPolitica']);

    //Usuarios - actualizar datos
    Route::get('/datos-basicos/{id}', [App\Http\Controllers\HomeController::class, 'mostrar_datos_usuario']);
    Route::put('/actualizar-usuario/{id}', [App\Http\Controllers\UsuarioController::class, 'actualizar_datos']);
    Route::get('/correo-electronico/{id}', [App\Http\Controllers\HomeController::class, 'mostrar_correo']);
    Route::put('/actualizar-usuario-email/{id}', [App\Http\Controllers\UsuarioController::class, 'actualizar_usuario_email']);
    Route::get('/cambio-contrasena/{id}', [App\Http\Controllers\HomeController::class, 'mostrar_contrasena']);
    Route::put('/actualizar-usuario-pass/{id}', [App\Http\Controllers\UsuarioController::class, 'actualizar_usuario_pass']);

    /*Tienda*/
    Route::get('/tienda', [App\Http\Controllers\TiendaController::class, 'index'])->name('tienda.index');
    Route::get('/tienda/dashboard-tienda', [App\Http\Controllers\TiendaController::class, 'dashboard']);
    Route::get('/tienda/dashboard-tienda/crear-productos/{id}', [App\Http\Controllers\TiendaController::class, 'create']);
    Route::post('/tienda/dashboard-tienda/registro-producto', [App\Http\Controllers\TiendaController::class, 'registroProducto']);
    Route::get('/tienda/{nombre}', [App\Http\Controllers\TiendaController::class, 'show_producto']);
    Route::get('/tienda/{empresa}/producto/{nombre}', [App\Http\Controllers\TiendaController::class, 'producto_vista']);
    /*Productos */
    Route::get('/productos', [App\Http\Controllers\TProductoController::class, 'index']);
    /*Peliculas*/
    Route::get('/sala-de-entretenimiento', [App\Http\Controllers\MovieController::class, 'index']);
    Route::get('/sala-de-entretenimiento/{slug}', [App\Http\Controllers\MovieController::class, 'show'])->name('peliculas.video');

    Route::put('/cambiar-foto-perfil', [App\Http\Controllers\UsuarioController::class, 'cambiarFotoPerfil']);
    Route::put('/eliminar-foto-perfil', [App\Http\Controllers\UsuarioController::class, 'eliminarFotoPerfil']);

    Route::get('/publicaciones-video', [App\Http\Controllers\HomeController::class, 'getVideo']);
    Route::match(['post', 'get'], '/cargar', [App\Http\Controllers\HomeController::class, 'postViewUpload'])->name('post.cargar');
    Route::post('/card-post-store', [App\Http\Controllers\UsuarioController::class, 'post_store'])->name('post.store');
    Route::post('/follow-user', [App\Http\Controllers\UsuarioController::class, 'seguirUsuario']);
    Route::post('/post-commet', [App\Http\Controllers\UsuarioController::class, 'postComment']);
    Route::delete('/post-delete', [App\Http\Controllers\UsuarioController::class, 'postDelete'])->name('post.delete');
    Route::get('/post-opinion', [App\Http\Controllers\UsuarioController::class, 'postInfo']);
    Route::get('/post-view-comment', [App\Http\Controllers\UsuarioController::class, 'postViewComment']);

    Route::put('/{nombre}/update-profile', [App\Http\Controllers\UsuarioController::class, 'usuario_actualizar_datos']);

    /*Buscador*/
    Route::get('/buscar', [App\Http\Controllers\UsuarioController::class, 'buscando']);
    /*Fin*/

    /*PostAction*/
    Route::post('/post-action', [App\Http\Controllers\PostActionController::class, 'postAction']);
    Route::delete('/post-action-delete', [App\Http\Controllers\PostActionController::class, 'postActionDelete']);
    Route::get('/notificaciones', [App\Http\Controllers\PostActionController::class, 'obtenerNofificacionesComentarios']);
    Route::post('/tokens-one', [App\Http\Controllers\PostActionController::class, 'tokens_inicio']);
    Route::delete('/post-delete', [App\Http\Controllers\PostActionController::class, 'postDelete']);
    Route::put('/post-edit', [App\Http\Controllers\PostActionController::class, 'postEdit']);
    Route::put('/post-most-notify', [App\Http\Controllers\PostActionController::class, 'checkNotificacion']);
    Route::get('/follow-count', [App\Http\Controllers\PostActionController::class, 'getFollows']);
    Route::get('/muro', [App\Http\Controllers\PostActionController::class, 'getMuro']);
    Route::post('/post-muro', [App\Http\Controllers\PostActionController::class, 'postMuro']);
    Route::delete('/opinion-delete-muro', [App\Http\Controllers\PostActionController::class, 'opinionDelete']);
    Route::delete('/eliminar-comentario', [App\Http\Controllers\PostActionController::class, 'eliminarComentario']);
    /*End*/

    /*Consultas axios*/
    Route::get('/sugerencias-ult', [App\Http\Controllers\PostActionController::class, 'getSugerenciasUlt']);


    Route::delete('/delete-follow-user', [App\Http\Controllers\UsuarioController::class, 'eliminarUsuario']);

    /*Monetización*/
    Route::get('/{nombre}/monetizacion', [App\Http\Controllers\UsuarioController::class, 'infoMonetizacion'])->name('monetizacion.index');
    /*Fin*/

    /*configuracion-privacidad-perfil*/
    Route::delete('/delete-count', [App\Http\Controllers\UsuarioController::class, 'eliminarCuenta']);
    /*Fin*/

    /*promocionar publicidad*/
    Route::get('/centro-de-promocion/crear', [App\Http\Controllers\CentroPromocionController::class, 'index'])->name('promocionar.index');
    /**/

    /*Settings*/
    Route::match(['PUT', 'get', 'post'], '/settings',  [App\Http\Controllers\HomeController::class, 'settings'])->name('settings.index');
    Route::match(['PUT', 'get'], '/settings/profile',  [App\Http\Controllers\HomeController::class, 'settings_profile'])->name('settings.profile');
    Route::match(['PUT', 'get'], '/settings/password',  [App\Http\Controllers\HomeController::class, 'settings_password'])->name('settings.password');
    Route::match(['PUT', 'get'], '/settings/verify-count',  [App\Http\Controllers\HomeController::class, 'settings_verify_count'])->name('settings.verify');
    Route::get('/settings/create-bussines',  [App\Http\Controllers\HomeController::class, 'settings_create_bussines'])->name('settings.bussines');
    //Action
    Route::put('/settings-edit', [App\Http\Controllers\HomeController::class, 'settings_edit']);
    Route::put('/settings-edit-profile', [App\Http\Controllers\HomeController::class, 'settings_edit_profile']);
    Route::put('/settings-edit-password', [App\Http\Controllers\UsuarioController::class, 'actualizar_usuario_pass']);
    Route::post('/settings-create-bussines', [App\Http\Controllers\HomeController::class, 'crear_tienda']);
    Route::post('/settings-update-bussines', [App\Http\Controllers\HomeController::class, 'editar_tienda']);
    Route::post('/settings-post-verify-acount', [App\Http\Controllers\HomeController::class, 'store_verify_count']);
    Route::post('/settings-post-verify-pay', [App\Http\Controllers\HomeController::class, 'store_verify_pay']);
    /*Fin*/

    /*Ruta mentions*/
    Route::get('/get-following', [App\Http\Controllers\PostActionController::class, 'getFollowing']);
    Route::post('/post-mentions', [App\Http\Controllers\PostActionController::class, 'postMentions']);

    Route::get('/cerrar-sesion', [App\Http\Controllers\HomeController::class, 'cerrar_sesion'])->name('home.salir');
});

/*Rutas libres*/

    // Rutas que se pueden acceder con sesión iniciada
    Route::get('/post', [App\Http\Controllers\HomeController::class, 'getPost']);
    Route::get('/para-ti', [App\Http\Controllers\HomeController::class, 'index'])->name('para-ti');
    Route::get('/visitando', [App\Http\Controllers\HomeController::class, 'visitando'])->name('visitando');
    Route::get('/{usuario}/post/{video}', [App\Http\Controllers\HomeController::class, 'postSpecific'])->name('post.view');
    Route::get('/post-count', [App\Http\Controllers\PostActionController::class, 'getLikes']);
    Route::get('/comment-post', [App\Http\Controllers\PostActionController::class, 'getComments']);

    Route::post('/register-bussines', [App\Http\Controllers\EmpresaController::class, 'store'])->name('empresa.store');

    Route::match(['post', 'get'], '/{nombre}', [App\Http\Controllers\UsuarioController::class, 'usuario'])->name('perfil');
