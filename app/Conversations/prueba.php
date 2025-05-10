<?php
namespace App\Conversations;

use BotMan\BotMan\Messages\Incoming\Answer;
use App\Utils\preguntas;


class prueba extends preguntas
{
    //array donde se elgien las preguntas que se van hacer y el flujo que va a seguir
    protected $dialogo = array(
        'preguntarJuzgadoDeIns',
        'preguntarSolteroNombreAbogado',
        'preguntarIDAbogado',
        'preguntarNITAbogado',
        'preguntarNombreApoderado',
        'preguntarNombreImputado'
    );

    public function startConversacion()
    {
        $this->preguntarNombreAbogado($this->dialogo,"PDFPoderImputados"); //empieza el dialgo enviado el flujo de la conversacion
                                                                           //y el callvack a ejecutar que es la generacion del PDF correspondiente
        
    }
    public function run()
    {
        $this->startConversacion();

    }
}


?>