<?php

//СООБЩЕНИЯ ПОЛЬЗОВАТЕЛЯ

include_once 'Models/MessageModel.php';


function messageAction($twig){
$correspondence = 0;

if($_SESSION['userId']){
    $correspondence = message($_SESSION['userId']);
}

    $twig->addGlobal('correspondence', $correspondence);
    

    echo $twig->render("header.twig");
    echo $twig->render("message.twig");
    echo $twig->render("footer.twig");
}