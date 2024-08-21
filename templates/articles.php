<?
  include_once 'templates/header.php';
?>

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
        <p>
            <a href="/?act=add" class="btn btn-secondary btn-secondary-green my-2">Добавить новую статью</a>
            <a href="/?act=profile" class="btn btn-primary my-2">Профиль</a>
            <a href="#" class="btn btn-secondary my-2">Все публикации</a>
        </p>
        </div>
    </section>

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
                <?while ($row = $result->fetch_assoc()): //вывод статей из БД?> 
                <tr>
                    <th scope="row"><?=$row['id']?></th>
                    <td><?=$row['title']?></td>
                    <td><?=$row['createdAt']?></td>
                    <td></td>
                    <td>
                        <a href="/?act=edit&id=<?=$row['id']?>"><button type="button" class="btn btn-primary">Редактировать</button></a>
                        <a href="/?act=delete&id=<?=$row['id']?>"><button type="button" class="btn btn-danger">Удалить</button></a>
                    </td>
                </tr>
                <? endwhile ?>
                <? if ($result->num_rows === 0): ?>
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