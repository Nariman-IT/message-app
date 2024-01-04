<?php

//ПРОФИЛЬ ПОЛЬЗОВАТЕЛЯ

// Подключение модели
include_once 'models/AccountModel.php';

if(isset($_GET['userId'])){
$_SESSION['userId'] = $_GET['userId'];
}

function accountAction($twig){

    // Получаю ID пользователя
    if(isset($_GET['userId'])){
        $userId = $_GET['userId'];
        $user = userInformation($userId);
    }
    
    if(isset($_SESSION['userId'])){
        $userId = $_SESSION['userId'];
        $user = userInformation($userId);
    }


    $twig->addGlobal('user', $user);
    

    echo $twig->render("header.twig");
    echo $twig->render("account.twig");
    echo $twig->render("footer.twig");
}

