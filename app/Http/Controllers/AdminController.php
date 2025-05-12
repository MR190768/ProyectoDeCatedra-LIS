<?php

namespace App\Http\Controllers;

use App\Models\Descarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // En tu controlador de administrador
    // Método para mostrar el perfil del usuario con sus descargas
    public function perfil()
    {
        // Obtener las descargas del usuario autenticado
        $descargas = Auth::user()->descargas()->with('contrato')->get();
        
        return view('users.perfil', compact('descargas'));
    }
}
