<?php

namespace App\Http\Controllers;
use App\Utils\docPDF;
use App\Models\Contrato;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    public function generar(Request $request)
    {
        $contrato = Contrato::findOrFail($request->contrato_id);
        $datos = $request->input('datos');

        $nombreArchivo = docPDF::crearPDF($datos, $contrato->titulo);

        return response()->download(storage_path("app/public/Docs/{$nombreArchivo}"));
    }
}
