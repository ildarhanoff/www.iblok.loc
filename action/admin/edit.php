<?

$id = $_GET['id'] ?? null;
if (!$id) {
    redirect('/admin'); 
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
    $categoryId = (int)$_POST['categoryId'];
    $categoryId = $categoryId ?: null;
    $isPublished = $_POST['isPublished'] ?? 0;

    $stmt = $pdo->prepare("UPDATE article SET " . $sql . "title = ?, content =  ?, categoryId = ?, isPublished = ? WHERE id = ?");
    $stmt->execute([$title, $content, $categoryId, $isPublished, $id]);

    redirect('/admin');
}

$stmtCategory = $pdo->prepare("SELECT * FROM category ORDER BY name");
$stmtCategory->execute();

$stmt = $pdo->prepare("SELECT * from article WHERE id = ? LIMIT 1");
$stmt->execute([$id]);

$article = $stmt->fetch();
if (!$article) {
    redirect('/admin');
}




require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/edit.php';

?>