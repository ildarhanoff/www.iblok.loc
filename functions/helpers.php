<?

function redirect(string $uri): void
{
    header ('Location: ' . $uri); //направляем пользователя в страницу авторизации
   die();
}

function getUser($pdo): array //функция проверки сессии авторизации(для того чтобы этот код не подключать во всех файлах)
{
    
    $userId = (int)($_SESSION['userId'] ?? null); //null проверка //в переменную id передается сессия юзерАйди  // также привели строку к int для того чтобы любое значение попавшая сюда, будет сделана в int
    if(!$userId) {
        return []; //если нет юзерайди, то возвращаем пустой массив
    }
    $stmt = $pdo->prepare("SELECT * FROM user WHERE id = ? LIMIT 1"); //из БД берутся все строки где поле id в таблице совпадает с переменной $id, куда мы и вложили сессию
    $stmt->execute([$userId]);
    $user = $stmt->fetch(); //выбирает одну строку данных из таблицы, которую мы выбрали в переменной $result и возвращает ее в виде массива
    
    
    if(!$user) {  //если пользователь удален из БД, а он продолжает сидет в сессии, то здесь проверяется на то, что переменная $user существует
        return []; 
    }


    return $user;  //возвращаем переменную, так как она не видна
}



function getUserArticle($pdo, int $id, array $user): array
{
    if($user['isAdmin'] == 1) {
        $stmt = $pdo->prepare("SELECT * FROM article WHERE id = ?");
        $stmt->execute([$id]);
    } else {
        $stmt = $pdo->prepare("SELECT * FROM article WHERE id = ? AND userId = ?");
        $stmt->execute([$id, $user['id']]);
    }
    
    $article = $stmt->fetch();
    if (!$article) {
        redirect('/?act=articles');
        die();
    }

    return $article;
}



function checkAdminUser($pdo): array {
    $user = getUser($pdo);
    if($user['isAdmin'] != 1) {
        redirect('/?act=login');
    }

    return $user;
}



function upload(int $userId): string
{

    $img = $_FILES['file']['tmp_name'];
    $size_img = getimagesize($img);
    $width = $size_img[0];
    $height = $size_img[1];
    $mime = $size_img['mime'];

    switch ($size_img['mime']) {
        case 'image/jpeg':
            $src = imagecreatefromjpeg($img);
            $ext = "jpg";
            break;
        case 'image/gif':
            $src = imagecreatefromgif($img);
            $ext = "gif";
            break;
        case 'image/png':
            $src = imagecreatefrompng($img);
            $ext = "png";
            break;
    }

    $wNew = 348;
    $hNew = floor($height / ($width / $wNew));
    $dest = imagecreatetruecolor ($wNew, $hNew);

    imagecopyresampled($dest, $src, 0, 0, 0, 0, $wNew, $hNew, $width, $height);

    $filename = "photo-" . $userId . "-" . time() . '.' . $ext;
    $fullFilename = $_SERVER['DOCUMENT_ROOT'] . "/images/" . $filename; 


    switch ($mime) {
        case 'image/jpeg':
            imagejpeg($dest, $fullFilename, 100);
            break;
        case 'image/gif':
            imagegif($dest, $fullFilename);
            break;
        case 'image/png':
            imagepng($dest, $fullFilename);
            break;
    }

    return $filename;
}
?>