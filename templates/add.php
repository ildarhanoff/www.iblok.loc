<?
  include_once 'templates/header.php';
?>

<main role="main">
  <section class="jumbotron text-center">
    <div class="container">
    <p>
        <a href="/?act=articles" class="btn btn-secondary btn-secondary-green my-2">Статьи</a>
        <a href="/?act=profile" class="btn btn-primary my-2">Профиль</a>
        <a href="#" class="btn btn-secondary my-2">Все публикации</a>
    </p>
    </div>
  </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <form class="form-horizontal" role="form" method="POST" action="">
                <input type="hidden" name="act" value="add"/>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h2>Добавить статью</h2>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="form-group has-danger">
                            <label class="sr-only" for="email">Заголовок статьи</label>
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                                <input type="text" name="title" class="form-control" id="email"
                                       placeholder="Заголовок" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <i class="fa fa-close"></i> Example error message
                        </span>
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="form-group has-danger">
                            <label class="sr-only" for="text">Текст новую статьи</label>
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                                <textarea name="content" class="form-control" id="text"
                                          placeholder="Текст" required autofocus rows="15"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <i class="fa fa-close"></i> Example error message
                        </span>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem">
                    <div class="col-md-6"></div>
                    <div class="col-md-3 text-right">
                        <button type="submit" class="btn btn-success"><i class="fa fa-sign-in"></i> Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>


<?
  include_once 'templates/footer.php';
?>