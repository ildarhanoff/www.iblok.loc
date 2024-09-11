<?
  include_once 'templates/header.php';
?>

<main role="main">

    <? include_once 'templates/menu.php'; ?>

    <div class="album py-5 bg-light">
        <div class="container">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Заголовок</th>
                    <th scope="col">Время создания</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?while ($row = $stmt->fetch()): //вывод статей из БД?> 
                <tr>
                    <th scope="row"><?=$row['id']?></th>
                    <td><img src="/images/<?=$row['img']?>"/></td>
                    <td><?=$row['title']?></td>
                    <td><?=$row['createdAt']?></td>
                    <td></td>
                    <td>
                        <a href="/?act=edit&id=<?=$row['id']?>"><button type="button" class="btn btn-primary">Редактировать</button></a>
                        <a href="/?act=delete&id=<?=$row['id']?>"><button type="button" class="btn btn-danger">Удалить</button></a>
                    </td>
                </tr>
                <? endwhile ?>
                <? if ($stmt->rowCount() === 0): ?>
                    <tr>
                        <td colpan="4">Нет статей</td>
                    <tr>
                <?endif?>
                </tbody>
            </table>
        </div>
    </div>
</main>


<?
  include_once 'templates/footer.php';
?>