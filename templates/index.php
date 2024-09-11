<?
  include_once 'templates/header.php';
?>

<main role="main">

<? include_once 'templates/menu.php'; ?>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
        <? while ($row = $stmt->fetch()): //вывод статей из БД?> 
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img src="/images/<?=$row['img']?>" class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"/>
            <title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>

            <div class="card-body">
              <p class="card-text"><?=htmlspecialchars($row ['title']);//фильтрует html теги чтобы никто не мог их использовать для безопасности ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <a href="/?act=view&id=<?=$row['id']?>"><button type="button" class="btn btn-sm btn-outline-secondary">View</button>

                  <?php if ($user && $row['userId'] == $user['id']): ?>
                    <a href="/?act=edit&id=<?=$row['id']?>"><button type="button" class="btn btn-sm btn-outline-secondary">Edit</button></a>
                  <? endif ?>

                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>

          </div>
        </div>
        <? endwhile ?>
      </div>
    </div>
  </div>

</main>

<?
  include_once 'templates/footer.php';
?>