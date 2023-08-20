<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use App\Models\TProducto;

class TiendaController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->get('search');
        $usuario = DB::table('users')
            ->where('id', Auth::user()->id)
            ->first();
        $tiendas = DB::table('t_empresa')
            ->where('t_nombre', 'LIKE', '%' . $busqueda . '%')
            ->paginate(6);
        return view('tienda.tienda', compact('tiendas', 'busqueda', 'usuario'));
    }


    public function index_admin()
    {
        $tiendas = DB::table('t_empresa')
            ->join('pais', 't_empresa.t_id_pais', '=', 'pais.pa_id')
            ->get();
        return view('tienda.index', compact('tiendas'));
    }
    public function dashboard()
    {
        $empresa = DB::table('t_empresa')
            ->where('t_id_user_create', Auth::user()->id)
            ->first();

        $usuario = DB::table('users')
            ->where('id', Auth::user()->id)
            ->first();

        $productos = TProducto::where('tp_id_empresa', $empresa->t_id)
            ->paginate(10);

        return view('tienda.dashboard-tienda', compact('productos', 'empresa', 'usuario'))
            ->with('i', ($productos->currentPage() - 1) * $productos->perPage());
    }
    public function create_empresa()
    {
        $paises = DB::table('pais')->get();
        return view('tienda.create_empresa', compact('paises'));
    }

    public function registroEmpresa(Request $request)
    {
        $t_nombre = $request->get('t_nombre');
        $t_direccion = $request->get('t_direccion');
        $t_telefono = $request->get('t_telefono');
        $t_correo = $request->get('t_correo');
        $nombreFile = $request->file('t_imagen')->getClientOriginalName();
        $ruta = 'images/tienda/logo/' . $nombreFile;

        $t_enlace = $request->get('t_enlace');
        $t_pais = $request->get('t_pais');
        $t_descripcion = $request->get('t_descripcion');
        $t_eslogan = $request->get('t_eslogan');

        $nombre = Image::make($request->file('t_imagen'))->resize(800, 800);
        $nombre->save($ruta);

        DB::table('t_empresa')->insert([
            't_nombre' => $t_nombre,
            't_descripcion' => $t_descripcion,
            't_eslogan' => $t_eslogan,
            't_direccion' => $t_direccion,
            't_telefono' => $t_telefono,
            't_correo' => $t_correo,
            't_img_logo' => $ruta,
            't_enlace' => $t_enlace,
            't_id_pais' => $t_pais,
            't_estado' => 1,
        ]);

        return back()->with('success', 'Registro exitoso');
    }

    public function create($id)
    {
        $tienda = DB::table('t_empresa')
            ->where('t_id', $id)
            ->first();
        $usuario = DB::table('users')->where('id', Auth::user()->id)->first();
        return view('tienda.create', compact('tienda','usuario'));
    }

    public function registroProducto(Request $request)
    {
        $t_nombre = $request->get('t_nombre');
        $t_descripcion = $request->get('t_descripcion');
        $tp_enlace_producto = $request->get('tp_enlace_producto');
        $nombreFile = $request->file('t_imagen')->getClientOriginalName();
        $ruta = 'images/tienda/productos/' . $nombreFile;
        $tp_id_empresa = $request->get('tp_id_empresa');
        $tp_precio = $request->get('tp_precio');

        $nombre = Image::make($request->file('t_imagen'))->resize(800, 800);
        $nombre->save($ruta);

        DB::table('t_productos')->insert([
            'tp_nombre' => $t_nombre,
            'tp_descripcion' => nl2br($t_descripcion),
            'tp_enlace_producto' => $tp_enlace_producto,
            'tp_imagen' => $ruta,
            'tp_precio' => $tp_precio,
            'tp_id_empresa' => $tp_id_empresa,
        ]);

        return back()->with('success', 'Registro exitoso');
    }

    public function show_producto($nombre)
    {
        $empresa = DB::table('t_empresa')
            ->where('t_nombre', $nombre)
            ->first();
        $usuario = DB::table('users')
            ->where('id', Auth::user()->id)
            ->first();
        $productos = DB::table('t_productos')
            ->where('tp_id_empresa', $empresa->t_id)
            ->get();
        return view('tienda.show-producto', compact('productos', 'empresa', 'usuario'));
    }

    public function producto_vista($empresa, $nombre)
    {
        $empresa = DB::table('t_empresa')
            ->where('t_nombre', $empresa)
            ->first();
        $usuario = DB::table('users')
            ->where('id', Auth::user()->id)
            ->first();
        $producto = DB::table('t_productos')
            ->where('tp_nombre', $nombre)
            ->where('tp_id_empresa', $empresa->t_id)
            ->first();
        $productos = DB::table('t_productos')
            ->where('tp_nombre', '!=', $nombre)
            ->where('tp_id_empresa', $empresa->t_id)
            ->get();
        return view('tienda.producto', compact('producto', 'productos', 'empresa', 'usuario'));
    }

    public function eliminarEmpresa($nombre)
    {
        $empresa = DB::table('t_empresa')
            ->where('t_nombre', $nombre)
            ->first();

        $productos = DB::table('t_productos')
            ->where('tp_id_empresa', $empresa->t_id)
            ->get();

        foreach ($productos as $producto) {
            DB::table('t_productos')
                ->where('tp_id_empresa', $empresa->t_id)
                ->where('tp_id', $producto->tp_id)
                ->delete();
        }

        DB::table('t_empresa')
            ->where('t_nombre', $nombre)
            ->delete();

        return back()->with('success', 'Registro exitoso');
    }

    public function eliminarProducto($nombre)
    {
        $producto = DB::table('t_productos')
            ->where('tp_nombre', $nombre)
            ->delete();

        if ($producto) {
            return back()->with('success', 'El registro se elimino');
        } else {
            return back()->with('warning', 'El registro no se pudo eliminar, intentelo de nuevo');
        }
    }

    public function elegirPais()
    {
        $paises = DB::table('pais')->get();
        return view('tienda.seleccion-pais', compact('paises'));
    }
}
