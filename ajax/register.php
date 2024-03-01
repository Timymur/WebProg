<?php
$username = trim( filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS));
$email = trim( filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$password = trim( filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));
$surname = trim( filter_var($_POST['surname'], FILTER_SANITIZE_SPECIAL_CHARS));
$age = trim( filter_var($_POST['age'], FILTER_SANITIZE_SPECIAL_CHARS));
$gender = trim( filter_var($_POST['gender'], FILTER_SANITIZE_SPECIAL_CHARS));

$error = '';


if(strlen($username) < 2)
    $error = 'Введите имя';
else if(strlen($surname) < 2)
    $error = 'Введите фамилию';
else if(strlen($age) < 1)
    $error = 'Введите возраст';
else if(strlen($gender) < 2)
    $error = 'Введите пол';
else if(strlen($email) < 7)
    $error = 'Введите email';
else if(strlen($password) < 5)
    $error = 'Введите пароль';
if ($error!=''){
   echo $error;
   exit();
}

$pdo = new PDO('mysql:host=localhost;dbname=WebProg','root','');


$salt = ";&*$^$*@#";
$password = md5($salt . $password);

$sql = "INSERT INTO users(name, surname, age, gender, email, password) VALUES(?, ?, ?, ?, ?, ?)";
$query = $pdo->prepare($sql);
$query->execute([$username, $surname, $age, $gender, $email,  $password]);

echo "Done";

 ?>
