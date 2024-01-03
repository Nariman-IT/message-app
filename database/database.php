<?php

// Подключение базы данных

mysqli_report(MYSQLI_REPORT_OFF);

define('user', 'root');
define('password', '');
define('database', 'Message-app');
define('host', 'localhost');


$mysqli = @new mysqli(host, user, password, database);


if($mysqli->connect_error){
    print_r('Ошибка при подключении: ' . $mysqli->connect_error);
    exit;
}
