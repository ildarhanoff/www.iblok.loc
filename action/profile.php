<?

$user = checkUser($mysqli);

//Проверяем что отправил ПОСТ запрос с профиля
if(count($_POST)) {   
    $name = $_POST['name'] ?? null;
    $surname = $_POST['surname'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $about = $_POST['about'] ?? null;
    $mysqli->query("UPDATE user SET name = '" . $name . "', surname = '" . $surname . "', phone = '" . $phone . "', about = '" . $about . "'  WHERE id = " . $user['id']); //обновляем данные в БД
    header('Location: /?act=profile'); //редирект, потому что Пост запрос снова не отправился и он будет делать это постоянно
    exit;   
}


require_once 'templates/profile.php';
?>