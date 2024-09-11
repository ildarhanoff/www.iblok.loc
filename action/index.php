<?
$user= null; //если $userId нет в сессии, то выводить null
$userId = (int)($_SESSION['userId'] ?? null); //в переменную id передается сессия юзерАйди  // также привели строку к int для того чтобы любое значение попавшая сюда, будет сделана в int

//если $userId есть в сессии, то только тогда считывать статьи.
if ($userId) {
    $stmt = $pdo->prepare("SELECT * FROM user WHERE id = ? LIMIT 1"); //из БД берутся все строки где поле id в таблице совпадает с переменной $id, куда мы и вложили сессию
    $stmt->execute([$userId]);
    $user = $stmt->fetch(); //выбирает одну строку данных из таблицы, которую мы выбрали в переменной $stmt и возвращает ее в виде массива
}

$stmt = $pdo->query("SELECT * FROM article WHERE isPublished = 1 ORDER BY id DESC LIMIT 9"); //выводим статьи из БД на страницу





require_once 'templates/index.php';

?>