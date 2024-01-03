<?php
// АВТОРИЗАЦИЯ ПОЛЬЗОВАТЕЛЯ

// Подключение модели
include_once 'models/LoginModel.php';


function verificationAction() {


// Проверка корректности ввода 
if(!$_POST['userNameLog']){
    $resData['success'] = 0;
    $resData['message'] = 'Логин пользователя не введен!';
    echo json_encode($resData);
    return;
} elseif(!$_POST['password']) {
    $resData['success'] = 0;
    $resData['message'] = 'Пароль пользователя не введен!';
    echo json_encode($resData);
    return;
}


// Данные из POST
$userName = $_POST['userNameLog'];
$userName = strtolower($userName);
$userName = trim($userName);
$password = $_POST['password'];
$password = trim($password);


//Вход в систему
$status = 0;


// Проверяем соответствуют ли веденный пользователем имя и пароль в базе данных
function verification($userName, $password){
    if($userName && $password){
        return check($userName, $password);  
    }
}



// Авторизация пользователя
if(isset($userName) && isset($password)){
    $status = verification($userName, $password);
    
    if(!$status){
        $resData['success'] = 0;
        $resData['message'] = 'Имя пользователя или пароль не совпадают!';
        echo json_encode($resData);
        return;
    }

    $userId = getId($userName);
    
    if($userId){
        $resData['success'] = 1;
        $resData['message'] = 'Выполнен вход в аккаунт!';
        $resData['userId'] = $userId;
        echo json_encode($resData);
        return;
    } else {
        return;
    }


}

}