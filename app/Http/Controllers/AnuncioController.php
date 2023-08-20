<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Form;

/**
 * Class AnuncioController
 * @package App\Http\Controllers
 */
class AnuncioController extends Controller
{
  
    public function index()
    {
        $anuncios = Anuncio::paginate();

        return view('anuncio.index', compact('anuncios'))
            ->with('i', (request()->input('page', 1) - 1) * $anuncios->perPage());
    }

    public function create()
    {
        $anuncio = new Anuncio();
        return view('anuncio.create', compact('anuncio'));
    }

    public function store(Request $request)
    {
        request()->validate(Anuncio::$rules);

        $anuncio = new Anuncio;
        $anuncio->a_descripcion = $request->input('a_descripcion');
        $anuncio->a_estado = $request->input('a_estado',1);
        $anuncio->save();
        return redirect('/admin/anuncio')->with('success', 'Estado actualizado con exito');
    }

    public function show($id)
    {
        $anuncio = Anuncio::find($id);

        return view('anuncio.show', compact('anuncio'));
    }

    public function edit($id)
    {
        $anuncio = Anuncio::find($id);

        return view('anuncio.edit', compact('anuncio'));
    }

    public function update(Request $request, $id)
    {
        try {
            Anuncio::where('id', $id)
                ->update([
                    'a_descripcion' => $request->get('a_descripcion'),
                    'a_estado' => $request->get('a_estado'),
                ]);
                return redirect('/admin/anuncio')->with('success', 'Estado actualizado con exito');
        } catch (Exception $e) {
            return redirect('/admin/anuncio')
                ->back()
                ->with('warning', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $anuncio = Anuncio::find($id)->delete();

        return redirect('/admin/anuncio')->with('success', 'Estado eliminado con exito');
    }
    public function mostrar_anuncios_activos(){
        $anuncios_activos = Anuncio::where('a_estado', 1)->get();
        return view('home')->with('anuncios_activos', $anuncios_activos);
    }


}
