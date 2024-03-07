


<nav class="navbar navbar-expand-sm bg-dark bg-gradient navbar-dark">
  <div class="container ml-20">

    <a class="navbar-brand" href="main.php">Mess Anger</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="all_articles.php">Смотреть статьи</a>
        </li>
        <?php if(isset($_COOKIE['email'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="private.php">Личный кабинет</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add_article.php">Добавить статью</a>
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

          </ul>
        </li>
      </ul>
    </div>

  </div>
</nav>
