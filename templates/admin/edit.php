<?
include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/header.php';
?>

<main role="main">
    <div class="album py-5 bg-light">
        <div class="container">
            <form class="form-horizontal" role="form" method="POST" action="">
                <input type="hidden" name="act" value="edit"/>
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
                            <label class="sr-only" for="email">Title</label>
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                                <input type="text" name="title" class="form-control" id="email"
                                       placeholder="Title" value="<?=$article['title']?>" required autofocus>
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
                            <label class="sr-only" for="email">Категория</label>
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                                <select name="categoryId" class="form-control">
                                    <option value="0">---category---</option>
                                    <? while ($row = $stmtCategory->fetch()): ?>
                                    <option value="<?=$row['id']?>" <?if ($article['categoryId'] == $row['id']): ?> selected <? endif ?>><?=$row['name']?></option>
                                    <?endwhile ?>
                                </select>
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
                            <label class="sr-only" for="text">Текст</label>
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                                <textarea name="content" class="form-control" id="text"
                                          placeholder="Текст" required autofocus rows="15"><?=$article['content']?></textarea>
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
                            <label class="sr-only" for="file">Файл</label>
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                                <input type="file"  id="file" name="file"/>
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
                            <label class="sr-only" for="email">Опубликовано</label>
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                                Опубликовано<input type="checkbox" name="isPublished" value="1" <? if ($article['isPublished']) : ?> checked <? endif ?>>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
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
include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/footer.php';
?>