<?php

namespace App\Utils;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Attachments\File;
use BotMan\BotMan\Messages\Outgoing\OutgoingFile;
use App\Utils\docPDF;


class preguntas extends Conversation
{
    protected $nombre;
    protected $edad;
    protected $peso;
    protected $ins;
    protected $abName;
    protected $abNameSol;
    protected $abCodigo;
    protected $abNIT;
    protected $imputado;
    protected $apoderado;
    protected $mes=[
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


    //Todas las preguntas segun el mismo flujo lo que cambia es lo que preguntan y el dato que guardan
    //Recibe un array con el flujo de preguntas y un callback para ejecutar al final 
    public function preguntarNombre($preguntas, $callback)
    {
        $this->ask('¿Cuál es tu nombre?', function (Answer $answer) use ($preguntas, $callback) {   //Pregunta
            $this->nombre = $answer->getText();                                                     //Guarda Respuesta
            $next = array_shift($preguntas);                                                        //Obtiene la siguiente pregunta
            if ($next !== null) {                                                                   //Si hay una siguiente pregunta
                $this->$next($preguntas, $callback);                                                //Ejecuta la siguiente pregunta
            } else {                                                                                //Si no hay siguiente pregunta
                $this->$callback();                                                                 //Ejecuta el callback
            }
        });
    }

    public function preguntarNombreAbogado($preguntas, $callback)
    {
        $this->ask('¿Cuál Nombre del  Abogado?', function (Answer $answer) use ($preguntas, $callback) {
            $this->abName = $answer->getText();
            $next = array_shift($preguntas);
            if ($next !== null) {
                $this->$next($preguntas, $callback);
            } else {
                $this->$callback();
            }
        });
    }

    public function preguntarSolteroNombreAbogado($preguntas, $callback)
    {
        $this->ask('¿Cuál Nombre de soltero del  Abogado?', function (Answer $answer) use ($preguntas, $callback) {
            $this->abNameSol = $answer->getText();
            $next = array_shift($preguntas);
            if ($next !== null) {
                $this->$next($preguntas, $callback);
            } else {
                $this->$callback();
            }
        });
    }

    public function preguntarIDAbogado($preguntas, $callback)
    {
        $this->ask('¿Cuál es el ID del Abogado?', function (Answer $answer) use ($preguntas, $callback) {
            $this->abCodigo = $answer->getText();
            $next = array_shift($preguntas);
            if ($next !== null) {
                $this->$next($preguntas, $callback);
            } else {
                $this->$callback();
            }
        });
    }

    public function preguntarNombreImputado($preguntas, $callback)
    {
        $this->ask('¿Cuál Nombre del imputado?', function (Answer $answer) use ($preguntas, $callback) {
            $this->imputado = $answer->getText();
            $next = array_shift($preguntas);
            if ($next !== null) {
                $this->$next($preguntas, $callback);
            } else {
                $this->$callback();
            }
        });
    }

    public function preguntarNITAbogado($preguntas, $callback)
    {
        $this->ask('¿Cuál es NIT del abogado?', function (Answer $answer) use ($preguntas, $callback) {
            $this->abNIT = $answer->getText();
            $next = array_shift($preguntas);
            if ($next !== null) {
                $this->$next($preguntas, $callback);
            } else {
                $this->$callback();
            }
        });
    }

    public function preguntarNombreApoderado($preguntas, $callback)
    {
        $this->ask('¿Cuál Nombre del Apoderado?', function (Answer $answer) use ($preguntas, $callback) {
            $this->apoderado = $answer->getText();
            $next = array_shift($preguntas);
            if ($next !== null) {
                $this->$next($preguntas, $callback);
            } else {
                $this->$callback();
            }
        });
    }

    public function preguntarEdad($preguntas, $callback)
    {
        $this->ask('¿Cuál es tu edad?', function (Answer $answer) use ($preguntas, $callback) {
            $this->edad = $answer->getText();
            $next = array_shift($preguntas);
            if ($next !== null) {
                $this->$next($preguntas, $callback);
            } else {
                $this->$callback();
            }
        });
    }


    public function preguntarJuzgadoDeIns($preguntas, $callback)
    {
        $this->ask('¿A cuál JUZGADO ESPECIALIZADO DE INSTRUCCIÓN va dirigido?', function (Answer $answer) use ($preguntas, $callback) {
            $this->ins = $answer->getText();
            $next = array_shift($preguntas);
            if ($next !== null) {
                $this->$next($preguntas, $callback);
            } else {
                $this->$callback();
            }
        });
    }

    //Genera el PDF y segun datos recopilados y plantilla elegida
    //luego responde al usuario con un enlace para descargar del PDF
    function PDFPoderImputados()
    {
        $datos = [
            'abName' => $this->abName,                           
            'abNameSol' => $this->abNameSol,                    
            'abCodigo' => $this->abCodigo,                       
            'abNIT' => $this->abNIT,
            'imputado' => $this->imputado,
            'ins' => $this->ins,
            'apoderado' => $this->apoderado,
            'año'=> date('Y'),
            'mes'=> $this->mes[intval(date('m'))], 
            'dia'=> date('d')
        ];
        $path=docPDF::crearMPImputados($datos);
    
        $this->say('Aquí tienes un enlace a tu documento PDF: <a href="' . asset('storage/'.$path). '" target="_blank">Descargar PDF</a>');

    }

    function run() {}
}
