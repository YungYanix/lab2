<?php

    session_start();
    require_once 'connect.php';
    $id = htmlspecialchars($_POST['id'] ?? '');
    $post = htmlspecialchars($_POST['post'] ?? '');
    $login = htmlspecialchars($_POST['login'] ?? '');
    $date = date("Y-m-d H:i:s");
    if($post ==''){
        $_SESSION['message'] = "Поле поста не может быть пустым";
        header('Location: /update.php'.'?id='.$id);
    }
    elseif($login ==''){
        $_SESSION['message'] = "Введите логин";
        header('Location: /index.php'.'?id='.$id);
    }
    else{
    if(isset($_FILES['img']) && $_FILES['img']['name'] != ''){
    $path = 'uploads/'. time(). $_FILES['img']['name'];
        }
    else{
    $path = '';
    }
    $q = "UPDATE `post` SET `login`='$login',`text`='$post',`time`='$date',`image`='$path' WHERE `id` = '$id'";
    mysqli_query($connect,$q);
    header('Location:../index.php');
}
 ?>
