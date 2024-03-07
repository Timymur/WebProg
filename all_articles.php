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

      <div class="container">

        <?php
         $pdo = new PDO('mysql:host=localhost;dbname=WebProg','root','');
          $sql = "SELECT * FROM articles";
          $query = $pdo->query($sql);

         ?>
        <div class="container">
            <h1>Все статьи</h1>
            <hr>
        <?php
            while($article = $query->fetch(PDO::FETCH_OBJ)){

              $sql = "SELECT * FROM users WHERE id = ?";
              $zapros = $pdo->prepare($sql);
              $zapros->execute([$article->id_user]);
              $user = $zapros->fetch(PDO::FETCH_OBJ);

              echo "<div class='article bg-dark bg-gradient'>
                <h1>" . $user->name . " " . $user->surname . "</h1>
                <p> " . $article->text . " </p>
                <div>" . $article->datetime . "</div>
              </div>";
            }

      ?>


        </div>

      </div>





  </body>
</html>
