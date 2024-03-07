<?php

    $id = $_POST['del'];

    $pdo = new PDO('mysql:host=localhost;dbname=WebProg','root','');

    $sql = "DELETE FROM articles WHERE id = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$id]);

    $new_url = '../private.php';
    header('Location: '.$new_url);

 ?>
