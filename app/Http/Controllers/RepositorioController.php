<?php

namespace App\Http\Controllers;

use App\Models\Categoria; 
use App\Models\Contrato;
use Illuminate\Http\Request;

class RepositorioController extends Controller
{
   public function index()
    {
        $categorias = Categoria::withCount('contratos')->get();
        $contratos = Contrato::all(); 

        if ($categorias->isEmpty()) {
            $message = "No hay categorías disponibles.";
        } else {
            $message = null;
        }

        if ($contratos->isEmpty()) {
            $message = $message ?? "No hay contratos disponibles.";
        }

        return view('dashboard.repositorio', compact('categorias', 'contratos', 'message'));
    }

    public function show($id)
    {
        $categoria = Categoria::with('contratos')->findOrFail($id);

        if ($categoria->contratos->isEmpty()) {
            $message = "No hay contratos disponibles para esta categoría.";
        } else {
            $message = null;
        }

        return view('dashboard.repositorio', [
            'categorias' => Categoria::all(),
            'contratos' => $categoria->contratos,
            'message' => $message,
        ]);
    }

    public function generarDocumento(Request $request)
{
    $request->validate([
        'juzgado' => 'required|string',
        'imputado' => 'required|string',
        'abogado' => 'required|string',
        'nit' => 'required|string',
        'fecha' => 'required|date',
    ]);

    $juzgado = $request->input('juzgado');
    $imputado = $request->input('imputado');
    $abogado = $request->input('abogado');
    $nit = $request->input('nit');
    $fecha = $request->input('fecha');


    $content = view('modelos.modeloDePoderImputados', compact('juzgado', 'imputado', 'abogado', 'nit', 'fecha'))->render();

    $filePath = 'contratos/poder_legal_' . time() . '.html';
    file_put_contents(storage_path('app/public/' . $filePath), $content);

    return response()->json(['message' => 'Documento generado correctamente', 'file_path' => $filePath]);
}


}
