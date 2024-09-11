<?

$user = getUser($pdo);
$error = '';
//Проверяем что отправил ПОСТ запрос с формы статьи
if(count($_POST)) {  
    $title = strip_tags($_POST['title'] ?? null); //strip_tags очищает от посторонних html тегов
    $content = strip_tags($_POST['content'] ?? null);
    
    if (!$_FILES['file']['size']) {  
        $error = 'Нет картинки';  
    } elseif (!$title || !$content) {  
        $error = 'Нет контента';  
    } else {
        $filename = upload($user['id']);
    
        $stmt = $pdo->prepare("INSERT INTO article SET img = ?, userId = ?, title = ?, content = ?, createdAt = NOW()");
        $stmt->execute([$filename, $user['id'], $title, $content]); //Запрос в БД на добавление записей, createdAt это значение текущей даты и времени, заполняется через sql
    redirect('/?act=articles'); //редирект, потому что Пост запрос снова не отправился и он будет делать это постоянно
    exit;   
    }
    
}   




require_once 'templates/add.php';
?>