<?php

    session_start();
    require_once 'connect.php';

    $post = htmlspecialchars($_POST['post'] ?? '');
    $login = htmlspecialchars($_POST['login'] ?? '');
    if(empty($post)){
        $_SESSION['message'] = "Поле поста не может быть пустым";
        header('Location: ../index.php');
    }
    else if(empty($login)){
        $_SESSION['message'] = "Введите логин";
        header('Location: ../index.php');
    }
    else{
    $date = date("Y-m-d H:i:s");
    if(isset($_FILES['img']) && $_FILES['img']['name'] != ''){
    $path = 'uploads/'. time(). $_FILES['img']['name'];
        }
    else{
    $path = '';
    }
    if(!move_uploaded_file($_FILES['img']['tmp_name'], $path)){
        echo "Ошибка загрузки файла";
    }
    else { move_uploaded_file($_FILES['img']['tmp_name'], $path);}
    $q = "INSERT INTO `post` (`id`, `login`, `text`, `time`, `image`) VALUES (NULL, '$login', '$post', '$date', '$path');";
    mysqli_query($connect, $q);
    header('Location:../index.php');
}
 ?>
