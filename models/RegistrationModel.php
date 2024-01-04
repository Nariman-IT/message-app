<?php

// РЕГИСТРАЦИЯ НОВОГО ПОЛЬЗОВАТЕЛЯ


function userRegistration($userName, $firstName, $lastName, $email, $hashPassword){
    global $mysqli;
    $userNewId = 0;
    $status = 0;

    $sql = "SELECT * FROM `users` WHERE `userName` = '$userName'";
    $result = $mysqli->query($sql);
  

    if(!$result->num_rows){

        // Генерация ID user и проверка
        $i = 1;
        while ($i) {
            $userNewId = rand(100000, 100000000);
            $sql = "SELECT * FROM `users` WHERE `id` = '$userNewId'";
            $id = $mysqli->query($sql);
            $i = $id->num_rows;
        }
    
        //Добавление нового пользователя в базу данных
        $sql = "INSERT INTO `users` (`id`, `userName`, `firstName`, `lastName`, `email`, `password`) VALUES ('$userNewId', '$userName', '$firstName', '$lastName', '$email', '$hashPassword')";
        $result = $mysqli->query($sql);
        
        $sql = "SELECT `id` FROM `users` WHERE `userName` = '$userName'";
        $result = $mysqli->query($sql);
        
        if($result->num_rows){
            $row = $result->fetch_assoc();
            $userId = $row['id'];
            $status = 1;
            return $status;
        } 

    } else {
            $status = 0;
            return $status;
            }
}


//ПОЛУЧЕНИЕ ID ПОЛЬЗОВАТЕЛЯ

function getId($username){
    global $mysqli;
    $userId = 0;

    if(!$username){
        return $userId;
    }

    $sql = "SELECT `id` FROM `users` WHERE `username` = '$username';";

    $result = $mysqli->query($sql);
    if($result->num_rows === 1){
        $row = $result->fetch_assoc();
        $userId = $row['id'];
    }
    return $userId;
}