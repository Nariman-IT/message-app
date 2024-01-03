<?php

//Подключение шаблонизатор Twig
require_once 'library/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('views/templates');
$twig = new \Twig\Environment($loader);


//Путь к контроллерам
define('PathPrefix', 'controllers/');
define('PathPostfix', 'Controller.php');
