<?php

function userInformation($userId){

    global $mysqli;

    $sql = "SELECT `firstName`, `lastName` FROM `users` WHERE `id` = '$userId'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc(); 
    return $row;
}
