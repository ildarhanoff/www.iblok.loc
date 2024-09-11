<?

$id = (int)$_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM article WHERE id = ?");
$stmt->execute([$id]);
$article = $stmt->fetch();  //выбирает одну строку данных из таблицы, которую мы выбрали в переменной $result и возвращает ее в виде массива

$stmtComment = $pdo->prepare("SELECT c.*, u.* FROM comment c LEFT JOIN user u ON u.id = c.userId WHERE c.articleId = ? AND c.isActive = 1");
$stmtComment->execute([$id]);

//Проверяем что пришло в пост в комменте 

if (count($_POST)) {
    $comment = $_POST['comment'];
    $user = getUser($pdo);
    $userId = $user['id'] ?? null;
    $isActive = $userId ? 1 : 0; //если получили юзерайди, то $isActive будет 1, если нет то 0
    $stmtAddComment = $pdo->prepare("INSERT INTO comment SET userId = ?, articleId = ? ,content = ?, isActive = ?, createdAt = NOW()");
    $stmtAddComment->execute([$userId, $id, $comment, $isActive]);
    redirect('/?act=view&id=' . $id);
}



require_once 'templates/view.php';

?>