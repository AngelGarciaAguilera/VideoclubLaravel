<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class CatalogController extends Controller {

    public function getIndex() {
        $films = Movie::all();
        return view("catalog/index", ['films' => $films]);
        //return view("catalog/index")->with('arrayPeliculas', $this->arrayPeliculas);
    }

    public function getShow(int $id) {
        //Con este método, si el id no existe, devuelve un 404 en lugar de un error
        $film = Movie::findOrFail($id);
        //$film = $this->arrayPeliculas[$id];
        return view("catalog/show", ["film" => $film]);
    }

    public function getCreate() {
        return view("catalog/create");
    }

    public function postCreate(Request $request){

        $request->validate([
            'title' => 'required|max:255',
            'year' => 'required|numeric|max_digits:4|min_digits:4',
            'director' => 'required|regex:/^[a-zA-Z ]+$/|max:64',
            'poster' => 'required|max:255',
            'synopsis' => 'required|min:10'
        ]);

        $movie = new Movie();
        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->director = $request->director;
        $movie->poster = $request->poster;
        $movie->rented = false;
        $movie->synopsis = $request->synopsis;

        $movie->save();

        return redirect(route('catalog.index'))->with('notification', 'Película creada correctamente.');

    }

    public function getEdit(int $id) {
        $film = Movie::findOrFail($id);
        //$film = $this->arrayPeliculas[$id];
        return view("catalog/edit", ["film" => $film]);
    }

    public function putEdit(Request $request, int $id){

        $request->validate([
            'title' => 'required|max:255',
            'year' => 'required|numeric|max_digits:4|min_digits:4',
            'director' => 'required|regex:/^[a-zA-Z ]+$/|max:64',
            'poster' => 'required|max:255',
            'synopsis' => 'required|min:10'
        ]);

        $movie = Movie::findOrFail($id);
        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->director = $request->director;
        $movie->poster = $request->poster;
        $movie->synopsis = $request->synopsis;

        $movie->save();

        return redirect(url('catalog/show/'.$id))->with('notification', 'Película modificada correctamente.');

    }

    public function putRent(int $id) {
        $movie = Movie::findOrFail($id);
        $movie->rented = true;

        $movie->save();

        return redirect(url('catalog/show/'.$id))->with('notification', 'Película alquilada correctamente.');
    }

    public function putReturn(int $id) {
        $movie = Movie::findOrFail($id);
        $movie->rented = false;

        $movie->save();

        return redirect(url('catalog/show/'.$id))->with('notification', 'Película devuelta correctamente.');
    }

    public function deleteMovie(int $id) {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect(url('catalog'))->with('notification', 'Película eliminada correctamente.');
    }

    public function getRented() {
        $movies = Movie::where('rented', 1)->get();

        return view('dashboard', ['films' => $movies]);
    }
}
