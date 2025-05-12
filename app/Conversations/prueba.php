<?php
namespace App\Conversations;

use BotMan\BotMan\Messages\Incoming\Answer;
use App\Utils\preguntas;
use BotMan\Middleware\DialogFlow\V2\DialogFlow;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Cache\LaravelCache;


class prueba extends preguntas
{

    public function startConversacion() {}
    public function opciones()
    {
        $ejemploArray = array(
            'PoderImputado',
            'PoderFamiliar'
        );
       
        $i = 0;
        $inicio = "Estas son al opciones Disponibles escriba el numero de la opcion: ";
        foreach ($ejemploArray as $opcion) {
            $inicio .= "<br>" . $i . ") " . $opcion;                                                                 //nombre del flujo de preguntas
            $i++;
        }
        $this->ask($inicio, function (Answer $answer) use ($ejemploArray) {
            if(is_numeric($answer->getText()) == false) {
                $this->say("Por favor ingrese un número válido");
                return $this->opciones();
            }
            $opcion = intval($answer->getText());                                                                          //nombre del flujo de preguntas
            $dialogo = json_decode(file_get_contents(storage_path('app/public/Dialogos/' . $ejemploArray[$opcion] . '.json')));
            $this->Dialogo($dialogo, $ejemploArray[$opcion]);
        });
    }

    public function run()
    {
        $this->opciones();
    }
}
