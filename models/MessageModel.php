<?php

function message($userId){

    global $mysqli;

    $sql = "SELECT `messageId`, `idFriend`, `message`, `userId`, `date` FROM `message` WHERE `userId` = '$userId'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc(); 
    return $row;
}
