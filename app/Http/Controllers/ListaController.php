<?php

// En tu controlador ListaController

namespace App\Http\Controllers;

use App\Models\Chirp; // Asegúrate de importar tu modelo Chirp si no lo has hecho
use Illuminate\Http\Request;

class ListaController extends Controller
{
    public function listadoJson()
    {
        // Obtén los chirps desde la base de datos
        $chirps = Chirp::all();

        // Devuelve los chirps como JSON
        return response()->json($chirps);
    }
}