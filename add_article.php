<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
<?php
    $website_title = 'Добавление статьи';
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

        <div class="mb-3">
          <label for="txt" class="form-label">Текст:</label>
          <textarea class="form-control" placeholder="Enter text" name="txt" id="txt" ></textarea>
        </div>

        <div class="error-mess mt-3" id='error-block'></div>

        <button type="button" id="add_article" class="btn btn-outline-light mb-10">Добавить</button>
      </form>
    </div>

    <?php require "blocks/footer.php" ;?>
    <script>
    $('#add_article').click(function(){
        let text = $('#txt').val();

        $.ajax({
            url: "ajax/add_article.php",
            type: 'POST',
            cache: false,
            data: {'text': text},
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
