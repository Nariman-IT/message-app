<?php

// ПРОВЕРКА ДАННЫХ

function check($userName, $password){
    global $mysqli;
	$status = 0;

    $sql = "SELECT `id`, `username`,`password` FROM `users` WHERE `username` = '$userName'";
    
    $result = $mysqli->query($sql);
    if($result->num_rows === 1){
        $row = $result->fetch_assoc();
        if($row['username'] === $userName && hash_equals($row['password'], crypt($password, '$1$'))){
            $status = 1;
            } else {
                $status = 0;
            }
    } else {
        $status = 0;
    }

    return $status;
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
