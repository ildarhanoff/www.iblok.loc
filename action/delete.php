<?

$user = getUser($pdo);

$id = $_GET['id'] ?? null;
if (!$id) {
    redirect('/?act=articles'); 
    die();  
}

$id = $_GET['id'] ?? null;
if (!$id) {
    redirect('/?act=articles');
    die();
}

$article = getUserArticle($pdo, $id, $user);


@unlink($_SERVER['DOCUMENT_ROOT'] . "/images/" . $article['img']); //функция удаление файлов, если статья удалится, @функция подавления ошибок

if($user['isAdmin']) {
    $stmt = $pdo->prepare("DELETE FROM article WHERE id = ?");
    $stmt->execute([$id]);
    redirect('/?act=adminArticles'); 
} else {
    $stmt = $pdo->prepare("DELETE FROM article WHERE id = ? AND userId = ?");
    $stmt->execute([$id, $user['id']]);
    redirect('/?act=articles'); 
}




require_once 'templates/delete.php'

?>