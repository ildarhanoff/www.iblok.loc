<?php
require_once 'config.php';
session_start();
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); //Значения записываются напрямую, поэтому лучше сделать через config.php



//Маршрутизация страниц
if (isset($_GET['act'])) {  
    switch($_GET['act']) {
        case 'register':
            require_once 'action/register.php';
        break;
        case 'login':
            require_once 'action/login.php';
        break;
        case 'profile':
            require_once 'action/profile.php';
        break;
        case 'add':
            require_once 'action/add.php';
        break;
        case 'articles':
            require_once 'action/articles.php';
        break;
        case 'edit':
            require_once 'action/edit.php';
        break;
        case 'delete':
            require_once 'action/delete.php';
        break;
    }
    die();
}

require_once 'templates/index.php';
?>

