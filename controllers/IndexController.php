<?php

// Загрузка главной страницы
function indexAction($twig){

    echo $twig->render("header.twig");
    echo $twig->render("registration-form.twig");
    echo $twig->render("footer.twig");
}