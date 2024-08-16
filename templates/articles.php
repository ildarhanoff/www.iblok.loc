<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Signin Template · Bootstrap v4.6</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

<main role="main">
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
                        <a href="/?act=edit"><button type="button" class="btn btn-primary">Редактировать</button></a>
                        <a href="/?act=delete"><button type="button" class="btn btn-danger">Удалить</button></a>
                    </td>
                </tr>
                <? endwhile ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
