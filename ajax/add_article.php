<?php
    $datetime = date("Y-m-d H:i:s");
    $email = $_COOKIE['email'];
    $text = trim( filter_var($_POST['text'], FILTER_SANITIZE_SPECIAL_CHARS));

    $error = '';

    if(strlen($text) < 10)
        $error = 'Введите текст';

    if ($error!=''){
       echo $error;
       exit();
    }

    $pdo = new PDO('mysql:host=localhost;dbname=WebProg','root','');

    $sql = "SELECT * FROM users WHERE email = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$email]);
    $user = $query->fetch(PDO::FETCH_OBJ);

    $sql = "INSERT INTO  articles (id_user, text, datetime) VALUES(?, ?, ?)";
    $query = $pdo->prepare($sql);
    $query->execute([$user->id, $text, $datetime ]);


    echo "Done";
 ?>
