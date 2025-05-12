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
    protected $datos = []; //array donde se guardan los datos de la conversacion



    //Todas las preguntas segun el mismo flujo lo que cambia es lo que preguntan y el dato que guardan
    //Recibe un array con el flujo de preguntas y un callback para ejecutar al final 
    public function Dialogo($preguntas, $plantilla)
    {
        $pregunta = array_shift($preguntas);
        $this->ask($pregunta, function (Answer $answer) use ($preguntas, $plantilla,$pregunta) {   //Pregunta
            array_push($this->datos,$answer->getText());                                       //Guarda Respuesta                                                       //Obtiene la siguiente pregunta
            if (!empty($preguntas)) {                                                               //Si hay una siguiente pregunta
                $this->Dialogo($preguntas, $plantilla);                                                //Ejecuta la siguiente pregunta
            } else {   
                                                                                  //Si no hay siguiente pregunta
                $this->GeneradorDoc($plantilla);                                                                 //Ejecuta el callback
            }
        });
    }

    //Genera el PDF y segun datos recopilados y plantilla elegida
    //luego responde al usuario con un enlace para descargar del PDF
    function GeneradorDoc($plantilla)
    {
        $path=docPDF::crearPDF($this->datos,$plantilla); //Genera el PDF y lo guarda en la ruta especificada

        $this->say('Aquí tienes un enlace a tu documento PDF: <a href="' . asset('storage/Docs/'.$path). '" target="_blank">Descargar PDF</a>');

    }

    function run() {}
}
