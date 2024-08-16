<?

$error = '';
//Проверка, передались ли значения ПОСТ 
if(count($_POST) > 0) {
    $email = $_POST['email'] ?? null; //Проверка, заполнен ли емаил
    $password = $_POST['password'] ?? null; //Проверка, заполнен ли пароль

    $result = $mysqli->query("SELECT * FROM user WHERE email = '" . $email . "'"); //запрос в БД, есть ли такой пользователь
    $user = $result->fetch_assoc(); ////выбирает одну строку данных из таблицы, которую мы выбрали в переменной $result и возвращает ее в виде массива

    if($user && password_verify($password, $user['password'])) { //если пользователь существует И соответствует ли пароль хешу
        $_SESSION['userId'] = $user['id']; //то Сессия юзерАйди приравнивается к юзерАйди 
        header('Location: /?act=profile'); //и пользователь перекидывается на страницу профиля
        die();
    } else {
        $error = 'Пользователь не найден!';  //иначе выходит ошибка и появляется переменная появляется на странице templates/login.php
    }
}

require_once 'templates/delete.php'

?>