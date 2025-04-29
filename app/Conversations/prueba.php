<?php
namespace App\Conversations;

use BotMan\BotMan\Messages\Incoming\Answer;
use App\Utils\preguntas;


class prueba extends preguntas
{
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
        $this->preguntarNombreAbogado($this->dialogo,"PDFMDImputados");
        
    }
    public function run()
    {
        $this->startConversacion();

    }
}


?>