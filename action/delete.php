<?

$userId = checkUser($mysqli);

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: /?act=articles'); 
    die();  
}


$mysqli->query("DELETE FROM article WHERE id = " . $id . " AND userId = " . $user['id']);
header('Location: /?act=articles'); 



require_once 'templates/delete.php'

?>