<?php

    $email = trim( filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS));
    $pass = trim( filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

    $error = '';

    if(strlen($email) < 3)
        $error = 'Введите email';
    else if(strlen($pass) < 5)
        $error = 'Введите пароль';
    if ($error!=''){
       echo $error;
       exit();
    }

    $pdo = new PDO('mysql:host=localhost;dbname=WebProg','root','');


    $salt = ";&*$^$*@#";
    $pass = md5($salt . $pass);

    $sql = "SELECT id FROM users WHERE email = ? AND password = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$email, $pass]);

    if ($query->rowCount() == 0)
    {
        echo "Такого пользователя нет !!!";
        exit();
    }
    else
      setcookie('email', $email, time()+ 3600*24*30, "/");


    echo "Done";



 ?>
