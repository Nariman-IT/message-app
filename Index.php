<?php

// ГЛАВНАЯ СТРАНИЦА

if(!isset($_SESSION['userId'])){
    session_start();
}




//Подключение TWIG
include_once 'library/twig.php';

//Подключения базы данных
include_once 'database/database.php';

//Подключение конфигурации
include_once 'config/config.php';


// ОПРЕДЕЛЯЕМ С КАКИМ КОНТРОЛЕРОМ РАБОТАЕМ
$controllerName = isset($_GET["controller"]) ? ucfirst($_GET["controller"]) : 'index';
$actionName = isset($_GET["action"]) ? $_GET["action"] : 'index';



function d($value = null, $die = 1){
    echo 'Debug: <br/><pre>';
    print_r($value);
    echo '</pre>';

    if($die) die;
}

// ЗАГРУЗКА СТРАНИЦЫ
loadPage($twig, $controllerName, $actionName);


