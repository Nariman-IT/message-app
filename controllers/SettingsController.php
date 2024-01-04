<?php

//НАСТРОЙКИ ПОЛЬЗОВАТЕЛЯ

include_once 'models/SettingsModel.php';

function settingsAction($twig){

    $userId = $_SESSION['userId'];

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $dateUser = $_POST['date'];
    $city = $_POST['city'];
    $statusUser = $_POST['statusUser'];

    $data = [$firstName, $lastName, $dateUser, $city, $statusUser];
    $change = [];
    foreach($data as $value){
        if($value){
            $change[$value] = $value;
        }
    }


    $status = modification($change, $userId);


}
 