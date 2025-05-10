<?php
namespace App\Utils;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;


class docPDF{

    public static function crearMPImputados($datos){
        $pdf=Pdf::loadView('pdf.modeloDePoderImputados',$datos);   //carga plantilla correspondente que esta en estructurada en HTML
        $pdf->setPaper('A4', 'portrait');                          //configura el tamaño y orientacion del PDF
        $name='Reporte_'.time().'.pdf';                            //nombre el archivo
        $path = storage_path('app/public/'.$name);                 //ruta donde se guardara el archivo
        $pdf->save($path);                                         // guarda el archivo en la ruta especificada
        return $name;

    }
    
} 



?>