<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHome() {
        //Redireccionará a la URI /catalog, esta no es recomendable
        //return redirect("catalog");
        //Ahora redireccionará al alias de la ruta
        //return redirect(route("catalog.index"));
        return view("home");
    }
}
