<?
//Проверка, передались ли значения ПОСТ 
if (count($_POST) > 0) { 
    $email = $_POST['email'] ?? null;//Проверка, заполнен ли емаил
    $password = $_POST['password'] ?? null;//Проверка, заполнен ли пароль
    $password2 = $_POST['password2'] ?? null;//Проверка, заполнен ли пароль2

    $password = password_hash($password, PASSWORD_DEFAULT);//хеширование пароля
    
   $mysqli->query("INSERT INTO user SET email = '" . $email . "', password = '" . $password . "'"); //Создание пользователя в БД
   header ('Location: /?act=login');
   die();
}




require_once 'templates/register.php';

?>
