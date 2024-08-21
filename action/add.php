<?

$user = checkUser($mysqli);

//Проверяем что отправил ПОСТ запрос с формы статьи
if(count($_POST)) {   
    $title = $_POST['title'] ?? null;
    $content = $_POST['content'] ?? null;
    $mysqli->query("INSERT INTO article SET user = ". $user['id'] .", title = '" . $title . "', content = '" . $content . "', createdAt = NOW() "); //Запрос в БД на добавление записей, createdAt это значение текущей даты и времени, заполняется через sql
    header('Location: /?act=articles'); //редирект, потому что Пост запрос снова не отправился и он будет делать это постоянно
    exit;   
}   




require_once 'templates/add.php';
?>