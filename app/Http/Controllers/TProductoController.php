<?php

namespace App\Http\Controllers;

use App\Models\TProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class TProductoController
 * @package App\Http\Controllers
 */
class TProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $empresa = DB::table('t_empresa')
    ->where('t_correo', Auth::user()->email)
    ->first();

    $usuario = DB::table('users')
        ->where('id', Auth::user()->id)
        ->first();

    $productos = TProducto::where('tp_id_empresa', $empresa->t_id)
        ->paginate();

    return view('t-producto.index', compact('productos'))
        ->with('i', ($productos->currentPage() - 1) * $productos->perPage());

}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tProducto = new TProducto();
        return view('t-producto.create', compact('tProducto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TProducto::$rules);

        $tProducto = TProducto::create($request->all());

        return redirect()->route('t-productos.index')
            ->with('success', 'TProducto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tProducto = TProducto::find($id);

        return view('t-producto.show', compact('tProducto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tProducto = TProducto::find($id);

        return view('t-producto.edit', compact('tProducto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TProducto $tProducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TProducto $tProducto)
    {
        request()->validate(TProducto::$rules);

        $tProducto->update($request->all());

        return redirect()->route('t-productos.index')
            ->with('success', 'TProducto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tProducto = TProducto::find($id)->delete();

        return redirect()->route('t-productos.index')
            ->with('success', 'TProducto deleted successfully');
    }
}
