


<nav class="navbar navbar-expand-sm bg-dark bg-gradient navbar-dark">
  <div class="container ml-20">

    <a class="navbar-brand" href="#">Mess Anger</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Другие пользователи</a>
        </li>
        <?php if(isset($_COOKIE['email'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="#">Мои статьи</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Добавить статью</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="autorization.php" id="exit_user">Выйти</a>
        </li>
        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Регистрация</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="autorization.php">Войти</a>
        </li>
        <?php endif; ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Личный кабинет</a>
          <ul class="dropdown-menu">

            <?php if(isset($_COOKIE['login'])): ?>
              <li><a href="find.php" class="dropdown-item">Найти</a></li>
              <li><a href="add_note.php" class="dropdown-item">Добавить</a></li>
              <li><a href="login.php" class="dropdown-item">Кабинет</a></li>
            <?php else: ?>
              <li><a href="register.php" class="dropdown-item">Регистрация</a></li>
              <li><a href="login.php" class="dropdown-item">Войти</a></li>
            <?php endif; ?>

          </ul>
        </li>
      </ul>
    </div>

  </div>
</nav>
