<?php

session_start();


require_once 'config/config.php';
require_once 'config/router.php'; //Подключение файла с маршрутами
require_once 'functions/helpers.php';

$dsn = "mysql:host=" . DB_HOST .";dbname=" . DB_NAME . ";charset=utf8";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, DB_USER, DB_PASSWORD, $options);//Значения записываются напрямую, поэтому лучше сделать через config.php



//Маршрутизация страниц
//$_REQUEST - проверяет и гет и пост запросы
if (isset($_REQUEST['act']) && !empty($routers[$_REQUEST['act']])) {  
    //Если есть элемент $routers[$_REQUEST['act']], то подключаем файл
        require_once $routers[$_REQUEST['act']];
    } else {
    require_once 'action/index.php';
}

?>

