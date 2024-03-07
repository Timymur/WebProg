<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
<?php
    $website_title = 'Личный кабинет';
    require "blocks/head.php" ;
 ?>

 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <link rel="stylesheet" href="css/main.css">

</head>
  <body>

      <?php
          require "blocks/header.php" ;
      ?>

      <div class="container cabinet">
        <?php
         $pdo = new PDO('mysql:host=localhost;dbname=WebProg','root','');
         $sql = "SELECT * FROM users WHERE email = ?";
         $query = $pdo->prepare($sql);
         $query->execute([$_COOKIE['email']]);
         $row = $query->fetch(PDO::FETCH_OBJ);
        ?>
        <div class="info">

            <h1>Личный кабинет</h1>
            <hr>
            <ul>
              <li>Имя: <?= $row->name ?></li>
              <li>Фамилия: <?= $row->surname ?></li>
              <li>Возраст: <?= $row->age ?></li>
              <li>Пол: <?= $row->gender ?></li>
              <li>Email: <?= $_COOKIE['email'] ?></li>
            </ul>
        </div>
        <?php
          $sql = "SELECT * FROM users WHERE email = ?";
          $query = $pdo->prepare($sql);
          $query->execute([$_COOKIE['email']]);
          $user = $query->fetch(PDO::FETCH_OBJ);

          $sql = "SELECT * FROM articles WHERE id_user = ?";
          $query = $pdo->prepare($sql);
          $query->execute([$user->id]);


         ?>
        <div class="info_right">
            <h1>Мои статьи</h1>
            <hr>
        <?php
            while($article = $query->fetch(PDO::FETCH_OBJ)){

              echo "<form action='ajax/delete_article.php' method='POST'>
                <div class='article bg-dark bg-gradient'>
                        <input type='hidden' class='del' name ='del' id='del' value= " . $article->id . "> 
                        <h1>" . $user->name . " " . $user->surname . "</h1>
                        <p> " . $article->text . " </p>

                        <div>" . $article->datetime . "</div>
                        <div><button id='delete' name='delete' type='submit' class='delete'>Удалить статью</button></div>
                    </div>
                    </form>";
            }

      ?>


        </div>

      </div>


  </body>

</html>
