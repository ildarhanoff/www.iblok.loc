<?
if(empty($_SESSION['userId'])) {  //если сессия юзерАйди пустая
    header('Location: /?act=login'); //то пользователь отправляется на страницу авторизации
    die();
}

$id = $_SESSION['userId']; //в переменную id передается сессия юзерАйди
$result = $mysqli->query("SELECT * FROM user WHERE id = '" . $id . "' LIMIT 1"); //из БД берутся все строки где поле id в таблице совпадает с переменной $id, куда мы и вложили сессию
$user = $result->fetch_assoc(); //выбирает одну строку данных из таблицы, которую мы выбрали в переменной $result и возвращает ее в виде массива


if(!$user) {  //если пользователь удален из БД, а он продолжает сидет в сессии, то здесь проверяется на то, что переменная $user существует
    header('Location: /?act=login'); 
    die();  
}

//Проверяем что отправил ПОСТ запрос с профиля
if(count($_POST)) {   
    $name = $_POST['name'] ?? null;
    $surname = $_POST['surname'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $about = $_POST['about'] ?? null;
    $mysqli->query("UPDATE user SET name = '" . $name . "', surname = '" . $surname . "', phone = '" . $phone . "', about = '" . $about . "'  WHERE id = " . $id); //обновляем данные в БД
    header('Location: /?act=profile'); //редирект, потому что Пост запрос снова не отправился и он будет делать это постоянно
    exit;   
}


require_once 'templates/profile.php';
?>