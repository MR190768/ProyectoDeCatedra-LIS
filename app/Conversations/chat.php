<?php
namespace App\Conversations;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Cache\LaravelCache;
use BotMan\Middleware\DialogFlow\V2\DialogFlow;
use App\Conversations\prueba;
class chat{
    public $config = [];

    //funcion para inciar la conversacion, 
    //se carga el driver de web y se crea el botman
    //se carga el middleware de dialogflow
    //se escucha al usuario y se responde
    //dependiendo de la respuesta del Dialogflow
    //se responde al usuario
    public function startConversacion() {
    DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);
    $botman = BotManFactory::create($this->config, new LaravelCache());
        $dialogflow = DialogFlow::create('es');
        $botman->middleware->received($dialogflow);
        $botman->hears('.*', function (BotMan $bot) {
            $extras = $bot->getMessage()->getExtras();
            //$bot->reply($extras['apiReply']);
            if($extras['apiReply']=="info.pagina"){
                $bot->reply("En esta pagina podras encontrar informacion sobre el sistema de justicia penal,ponerte en contacto con un abogado,y si estas registrado ver recursos como plantillas y documentos legales");
            }
            else if($extras['apiReply']=="contacto"){
                $bot->reply('Si deseas ponerte en contacto con nosotros puedes hacerlo a traves de nuestro correo electronico y telefonos: <a href="'. route('contacto').'" target="_blank">Hazme Click Contactos</a>');              
            }
            else if($extras['apiReply']=="nosotros"){
                $bot->reply('Si deseas conocer mas de nosotros te invito a que visites <a href="'. route('about').'" target="_blank">Conocenos más</a>');              
            }
            else if($extras['apiReply']=="login"){
                $bot->reply('Si ya tienes una cuenta puedes iniciar sesiona aqui: <a href="'. route('login').'" target="_blank">Inicia sesion</a>');              
            }
            else if($extras['apiReply']=="registro"){
                $bot->reply('hay muchos beneficios para una de tener una cuenta en Acopre por ejemplo: si quieres acceder a plantillas u otros recurso, yo puedo ayudarte a perzonalizarlas : <a href="'. route('registro').'" target="_blank">Registrate AHORA</a>');              
            }
            else if($extras['apiReply']=="info.bot"){
                $bot->reply('Soy un asistente virtual creado por ACORPE, estoy aqui para ayudarte a encontrar la informacion que necesitas sobre el sistema de justicia penal y ponerte en contacto con un abogado, si tienes una cuenta puedo ayudarte a encontrar plantillas y documentos legales ademas puedo ayudarte a fabricar esas plantillas.');
            }
            else if($extras['apiReply']=="plantilla"){
                $bot->startConversation(new prueba);
            }
            else if($extras['apiReply']=="info.contacto"){
                $bot->reply('Si deseas ponerte en contacto con nosotros puedes hacerlo a traves de nuestro correo electronico y telefonos: <a href="'. route('contacto').'" target="_blank">Hazme Click Contactos</a>');              
            }
            else if($extras['apiReply']=="info.login"){
                $bot->reply('Si ya tienes una cuenta puedes iniciar sesiona aqui: <a href="'. route('login').'" target="_blank">Inicia sesion</a>');              
            }
            else if($extras['apiReply']=="info.registro"){
                $bot->reply('hay muchos beneficios para una de tener una cuenta en Acopre por ejemplo: si quieres acceder a plantillas u otros recurso, yo puedo ayudarte a perzonalizarlas : <a href="'. route('registro').'" target="_blank">Registrate AHORA</a>');              
            }
            else{
                $bot->reply($extras['apiReply']);
            }

        })->middleware($dialogflow);

    $botman->listen();
    }

}

?>