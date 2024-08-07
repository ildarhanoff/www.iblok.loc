<?php
require_once 'config.php';
session_start();
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); //Значения записываются напрямую, поэтому лучше сделать через config.php



if (isset($_GET['act'])) {
    switch($_GET['act']) {
        case 'register':
            require_once 'action/register.php';
        break;
        case 'login':
            require_once 'action/login.php';
        break;
    }
    die();
}

require_once 'templates/index.php';
?>

