<?php

// РЕГИСТРАЦИЯ ПОЛЬЗОВАТЕЛЯ

// Подключение модели
include_once 'models/RegistrationModel.php';

function registrationAction(){

    $status = 0;

    if($_POST['userNameReg'] && $_POST['firstName'] && $_POST['lastName'] && $_POST['email'] && $_POST['password']){
        $userName = $_POST['userNameReg'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashPassword = crypt($password, '$1$');


        $status = userRegistration($userName, $firstName, $lastName, $email, $hashPassword);

        if($status){
            $resData['success'] = 1;
            $resData['message'] = 'Регистрация прошла успешна!';
            echo json_encode($resData);
            return;
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Данный логин уже занят!';
            echo json_encode($resData);
            return;
        }
        
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["status"] = $login;
            $_SESSION["id"] = $uid;
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Для успешной регистрации заполните все поля!';
        echo json_encode($resData);
        return;
    }
        
}