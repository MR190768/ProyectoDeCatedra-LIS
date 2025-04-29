<?php

use Illuminate\Support\Facades\Route;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Cache\LaravelCache;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/chat', function () {
    return view('chat');
});

Route::match(['get', 'post'], 'chat/botman', function () {
    $config = [];

    DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);
    $botman = BotManFactory::create($config, new LaravelCache());

    $botman->hears('hola', function (BotMan $bot) {
        $bot->startConversation(new \App\Conversations\prueba());
    })->middleware('web');

    $botman->listen();
});
