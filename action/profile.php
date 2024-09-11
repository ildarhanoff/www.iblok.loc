<?

$user = getUser($pdo);

//Проверяем что отправил ПОСТ запрос с профиля
if(count($_POST)) {   
    $name = $_POST['name'] ?? null;
    $surname = $_POST['surname'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $about = $_POST['about'] ?? null;
    $stmt = $pdo->prepare("UPDATE user SET name = ?, surname = ?, phone = ?, about = ? WHERE id = ?");
    $stmt->execute([$name, $surname, $phone, $about, $_SESSION['userId']]); //обновляем данные в БД
    redirect('/?act=profile'); //редирект, потому что Пост запрос снова не отправился и он будет делать это постоянно
    exit;   
}


require_once 'templates/profile.php';
?>