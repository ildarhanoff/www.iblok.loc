<?

$user = getUser($pdo);

$stmt = $pdo->prepare("SELECT * from article ORDER BY id DESC");
$stmt->execute();
//считывает все статьи

require_once 'templates/articles.php';
?>