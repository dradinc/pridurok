<?php require 'blocks/head.php'; ?>
    <title>Авторизация | WSR PTK</title>
  </head>
  <body class="text-center">
    <form class="form-signin" action="php/auth.php" method="post">
      <img class="mb-4" src="img/wsPTKBlue.png" width="256" height="256">
      <h1 class="h3 mb-3 font-weight-normal">Пожалуйста, авторизируйтесь</h1>
      <input type="text" name ="login" id="inputLogin" class="form-control" placeholder="Логин">
      <br>
      <input type="password" name ="password" id="inputPassword" class="form-control" placeholder="Пароль">
      <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
      <br>
        <?php 
          if ($_COOKIE['user'] == 'Вход не выполнен') {
            echo '<h5 class="h5 mb-3 font-weight-normal" style="color: red">Неверный логин или пароль</h5>';
          }
        ?>
      <p class="mt-3 mb-3 text-muted">Designed by <a href ="https://vk.com/ilevickij">@ilevickij</a></p> 
    </form>
  </body>
</html>