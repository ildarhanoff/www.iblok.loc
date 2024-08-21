<?

$userId = checkUser($mysqli);

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: /?act=articles'); 
    die();  
}

 
//Проверяем что отправил ПОСТ запрос с формы статьи
if(count($_POST)) {   
    $title = $_POST['title'] ?? null;
    $content = $_POST['content'] ?? null;
    $mysqli->query("UPDATE article SET " . $sql . "title = '" . $title . "', content = '" . $content . "' WHERE id = " . $id . " AND userId = " . $user['id']);
    header('Location: /?act=articles'); //редирект, потому что Пост запрос снова не отправился и он будет делать это постоянно
    die;   
}   



$result = $mysqli->query("SELECT * FROM article WHERE id = '" . $id . "' AND userId = ". $user['id'] ." LIMIT 1"); 
$article = $result->fetch_assoc();
if (!$article) {
    header('Location: /?act=articles'); 
    die();  
}



require_once 'templates/edit.php';

?>