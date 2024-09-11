<?

$user = getUser($pdo);

$id = $_GET['id'] ?? null;
if (!$id) {
    redirect('/?act=articles'); 
    die();  
}

 
//Проверяем что отправил ПОСТ запрос с формы статьи
if(count($_POST)) {   
    $sql = '';
    if ($_FILES['file']['size']) { 
        $filename = upload($user['id']); //Картинку загруженную получаем 
        $sql = "img = '" . $filename . "', "; //Загружаем в переменную и отправляем запрос в sql ниже
        $article = getUserArticle($pdo, $id, $user); //Удаление картинки
        @unlink($_SERVER['DOCUMENT_ROOT'] . "/images/" . $article['img']); //функция удаление файлов, если статья удалится, @функция подавления ошибок
    }

    $title = strip_tags($_POST['title'] ?? null); //strip_tags очищает от посторонних html тегов
    $content = strip_tags($_POST['content'] ?? null);   
    if($user['isAdmin']) {
        $stmt = $pdo->prepare("UPDATE article SET " . $sql . "title = ?, content =  ? WHERE id = ?");
        $stmt->execute([$title, $content, $id]);
        
    } else {
        $stmt = $pdo->prepare("UPDATE article SET " . $sql . "title = ?, content =  ? WHERE id = ? AND userId = ?");
        $stmt->execute([$title, $content, $id, $user['id']]);
        
    }    
    die;   
}   

if($user['isAdmin']) {
    $stmt = $pdo->prepare("SELECT * from article WHERE id = ? LIMIT 1"); //Если Админ, то он может редактировать любую статью
    $stmt->execute([$id]);
} else {
    $stmt = $pdo->prepare("SELECT * from article WHERE id = ? AND userId = ? LIMIT 1");
    $stmt->execute([$id, $user['id']]);
}


$article = $stmt->fetch();
if (!$article) {
    redirect('/?act=articles'); 
    die();  
}



require_once 'templates/edit.php';

?>