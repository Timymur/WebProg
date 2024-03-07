<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
  <?php
      $website_title = 'Страница авторизации';
      require "blocks/head.php" ;
   ?>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="css/main.css">
</head>
  <body>
    <?php
        require "blocks/header.php" ;
    ?>
      <div class="container bg-dark bg-gradient form mt-5">
        <form >

          <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Пароль:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
          </div>
          <div class="error-mess mt-3" id='error-block'></div>

          <button type="button" id="reg_user" class="btn btn-outline-light mb-10">Войти</button>
        </form>
      </div>

      <?php require "blocks/footer.php" ;?>
      <script>
      $('#reg_user').click(function(){

          let email = $('#email').val();
          let pass = $('#password').val();

          $.ajax({
              url: "ajax/autorization.php",
              type: 'POST',
              cache: false,
              data: { 'email': email,
                      'password': pass},
              datatype: 'html',
              success: function(data){
                if(data === "Done"){
                  window.location.replace('private.php')
                }
                else{
                  $('#error-block').show();
                  $("#error-block").text(data);
                }
              }
          });
      });

      $('#exit_user').click(function(){

          $.ajax({
              url: "ajax/exit.php",
              type: 'POST',
              cache: false,
              data: { },
              datatype: 'html',
              success: function(data){
                if(data === "Done"){
                  window.location.replace('autorization.php');
                }
              }
          });
      });

      </script>

  </body>
</html>
