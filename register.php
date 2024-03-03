<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
  <?php
      $website_title = 'Страница регистрации';
      require "blocks/head.php" ;
   ?>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>
  <body >
    <?php
        require "blocks/header.php" ;
    ?>
      <div class="container bg-dark bg-gradient form mt-5">
        <form >

          <div class="mb-3">
            <label for="username" class="form-label">Имя:</label>
            <input type="text" class="form-control" placeholder="Enter name" name="username" id="username">
          </div>

          <div class="mb-3">
            <label for="surname" class="form-label">Фамилия:</label>
            <input type="text" class="form-control" placeholder="Enter surname" name="surname" id="surname">
          </div>

          <div class="mb-3">
            <label for="age" class="form-label">Возраст:</label>
            <input type="text" class="form-control" placeholder="Enter age" name="age" id="age">
          </div>

          <div class="mb-3">
            <label for="gender" class="form-label">Пол:</label>
            <input type="text" class="form-control" placeholder="Enter gender" name="gender" id="gender">
          </div>


          <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Пароль:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
          </div>
          <div class="error-mess mt-3" id='error-block'></div>

          <button type="button" id="reg_user" class="btn btn-outline-light mb-10">Зарегистрироваться</button>
        </form>
      </div>

      <?php require "blocks/footer.php" ;?>
      <script>
      $('#reg_user').click(function(){
          let name = $('#username').val();
          let surname = $('#surname').val();
          let email = $('#email').val();
          let age = $('#age').val();
          let gender = $('#gender').val();
          let pass = $('#password').val();

          $.ajax({
              url: "ajax/register.php",
              type: 'POST',
              cache: false,
              data: {'username': name,
                      'surname': surname,
                      'email': email,
                      'age': age,
                      'gender': gender,
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

      </script>

  </body>
</html>
