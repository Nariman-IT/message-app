<?php

// Подключение модели
include_once 'models/AccountModel.php';




function accountAction($twig){

    // Получаю ID пользователя
    $userId = $_GET['userId'];
    $user = userInformation($userId);
    $status = 'привет это мой первый статус';

    $twig->addGlobal('user', $user);
    $twig->addGlobal('status', $status);

    echo $twig->render("header.twig");
    echo $twig->render("account.twig");
    echo $twig->render("footer.twig");
}

