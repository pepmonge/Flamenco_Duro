<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller {

    // Función que muetra la video presentacion inicial
    public function __invoke() {
        return view('inicio');
    }
}
