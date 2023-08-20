<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

/**
 * Class MovieController
 * @package App\Http\Controllers
 */
class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::orderBy('created_at', 'desc')->paginate();
        $usuario = DB::table('users')->where('id', Auth::user()->id)->first();
        return view('peliculas.index', compact('movies'))
            ->with('i', (request()->input('page', 1) - 1) * $movies->perPage())
            ->with('usuario', $usuario);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movie = new Movie();
        return view('movie.create', compact('movie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Movie::$rules);

        $movie = Movie::create($request->all());

        return redirect('/peliculas')->with('success', 'Estado actualizado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $usuario = DB::table('users')->where('id', Auth::user()->id)->first();
        $movie = DB::table('movies')->where('nombre', $slug)->first();
        return view('peliculas.video', compact('movie','usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);

        return view('movie.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        request()->validate(Movie::$rules);

        $movie->update($request->all());

        return redirect()->route('movies.index')
            ->with('success', 'Movie updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $movie = Movie::find($id)->delete();

        return redirect('/peliculas-registro')->with('success', 'Movie deleted successfully');
    }
}
