<?php
// ФУНКЦИИ РОБОТА С ШАБЛОНАМИ


// Загрузка страницы
function loadPage($twig, $controllerName, $actionName){
    include_once PathPrefix . $controllerName . PathPostfix;
    $function = $actionName . 'Action';
    $function($twig);
}