<?

//Проверка, передались ли значения ПОСТ 

//Проверка, заполнен ли емаил
//Проверка, заполнен ли пароль
//Исправляет косяк с кавычкой, если ввести user@mail.ru', то ошибка не вылезет
//запрос в БД, есть ли такой пользователь
////выбирает одну строку данных из таблицы, которую мы выбрали в переменной $result и возвращает ее в виде массива

//если пользователь существует И соответствует ли пароль хешу
//то Сессия юзерАйди приравнивается к юзерАйди 
//и пользователь перекидывается на страницу профиля
//иначе выходит ошибка и появляется переменная появляется на странице templates/login.php


$error = '';
if (count($_POST) > 0) {
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    $stmt = $pdo->prepare("SELECT * from user WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['userId'] = $user['id'];
        redirect('/?act=profile');
    } else {
        $error = 'User is not found';
    }
}$error = '';
if (count($_POST) > 0) {
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    $stmt = $pdo->prepare("SELECT * from user WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['userId'] = $user['id'];
        if($user['isAdmin']) {
            redirect('/admin');
        } else {
            redirect('/?act=articles');
        }
        
    } else {
        $error = 'User is not found';
    }
}

require_once 'templates/login.php'

?>
