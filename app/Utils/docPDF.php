<?php
namespace App\Utils;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;


class docPDF{

    public static function crearPDF($datos,$plantilla){
     $mes=[
        'mes',
        'enero',
        'febrero',
        'marzo',
        'abril',
        'mayo',
        'junio',
        'julio',
        'agosto',
        'septiembre',
        'octubre',
        'noviembre',
        'diciembre'
    ];
        array_push($datos,date('d'));
        array_push($datos,$mes[intval(date('m'))]);
        array_push($datos,date('Y'));
        $pdf=Pdf::loadView('pdf.'.$plantilla,['datos'=>$datos]);        //carga plantilla correspondente que esta en estructurada en HTML
        $pdf->setPaper('A4', 'portrait');                                 //configura el tamaño y orientacion del PDF
        $name='Reporte_'.time().'.pdf';                                   //nombre el archivo
        $path = storage_path('app/public/Docs/'.$name);                   //ruta donde se guardara el archivo
        $pdf->save($path);                                                // guarda el archivo en la ruta especificada
        return $name;

    }
    
} 



?>