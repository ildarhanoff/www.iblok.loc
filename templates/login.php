<?
  include_once 'templates/header.php';
?>


    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      html,
body {
  height: 100%;
}

body {
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.error-blok {
    color: red;
    margin-bottom: 12px;
}

    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">

    
<form class="form-signin" action="" method="POST">
  <input type="hidden" name="act" value="login"/>
  <img class="mb-4" src="../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Пожалуйста Авторизуйтесь</h1>

  <div class="error-blok">
    <i><?= $error ?></i>
  </div>

  <label for="inputEmail" class="sr-only">Электронная почта</label>
  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Электронная почта" required autofocus>
  <label for="inputPassword" class="sr-only">Пароль</label>
  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Пароль" required>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Запомнить меня
    </label>
  </div>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Авторизоваться</button>
</form>

<?
  include_once 'templates/footer.php';
?>

