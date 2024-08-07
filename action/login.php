<?
//Проверка, передались ли значения ПОСТ 
if(count($_POST) > 0) {
    $email = $_POST['email'] ?? null; //Проверка, заполнен ли емаил
    $password = $_POST['password'] ?? null; //Проверка, заполнен ли пароль

    $password = password_hash($password, PASSWORD_DEFAULT); //хеширование пароля

    $result = $mysqli->query("SELECT * FROM user WHERE email = '" . $email . "'"); //запрос в БД, есть ли такой пользователь
    $user = $result->fetch_assoc();
    var_dump($user);
    exit;
}

require_once 'templates/login.php'

?>
