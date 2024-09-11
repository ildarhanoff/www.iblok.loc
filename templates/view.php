<?
  include_once 'templates/header.php';
?>
<main role="main">


  <section class="jumbotron text-center">
    <div class="container">
    <? include_once 'templates/menu.php';?>
    </div>
  </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <h3><?=$article['title']; ?></h3>
            
            <img src="/images/<?=$article['img']?>" alt="<?=$article['title']?>" align="left" vspace="5" hspace="5"/>

            <p>
                <?=$article['content']; ?>
            </p>

            <form action="" method="POST">
                <input type="hidden" name="act" value="view"/>
                <div class="form-group">
                    <label for="exampleInputEmail1">Текст</label>
                    <textarea class="form-control" id="exampleInputEmail1" name="comment" rows="5" placeholder="Comment"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Добавить комментарий</button>
            </form>

            <?while($comment = $stmtComment->fetch()): ?>
            <div>
              <p>
            <?=$comment['content'] ?>
              </p>
            </div>
            <?endwhile ?>
        </div>
    </div>
</main>


<?
  include_once 'templates/footer.php';
?>