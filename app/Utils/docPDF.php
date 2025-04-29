<?php
namespace App\Utils;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class docPDF{

    public static function crearMPImputados($datos){
        $pdf=Pdf::loadView('pdf.modeloDePoderImputados',$datos);
        $name='Reporte_'.time().'.pdf';
        $path = storage_path('app/public/'.$name);
        $pdf->save($path);
        return $name;

    }
    
} 



?>