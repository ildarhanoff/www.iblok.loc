
<?if (isset($user) && $user): ?>

<section class="jumbotron text-center">
        <div class="container">
        <p>
        <?if (isset($user) && $user['isAdmin'] == 1): //Если пользователь админ?>  
            <a href="/?act=adminArticles" class="btn btn-primary my-2">Cтатьи(Админ)</a>
        <? endif ?> 
            <a href="/?act=add" class="btn btn-secondary btn-secondary-green my-2">Добавить новую статью</a>
            <a href="/?act=articles" class="btn btn-secondary btn-secondary-green my-2">Cтатьи</a>
            <a href="/?act=profile" class="btn btn-primary my-2">Профиль</a>
            <a href="/?act=logout" class="btn btn-secondary my-2">Выход</a>
        </p>
        </div>

        <? else: ?>
            <div class="container">
                <p>
                <a href="/?act=login" class="btn btn-primary my-2">Логин</a>
                <a href="/?act=register" class="btn btn-secondary btn-secondary-green my-2">Регистрация</a>
                </p>
        <? endif ?>
    </section>

