<?php

namespace App\Http\Controllers;
use App\Models\Descarga;
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

        // Registrar la descarga en la base de datos
        $descarga = new Descarga();
        $descarga->user_id = auth()->user()->id;
        $descarga->contrato_id = $contrato->id;
        $descarga->fecha_de_descarga = now();
        $descarga->save();

        return response()->download(storage_path("app/public/Docs/{$nombreArchivo}"));
    }
}
