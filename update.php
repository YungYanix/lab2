<?php

    session_start();
    require_once 'connect.php';

    $post_id = $_GET['id'];
    $post = mysqli_query($connect, "SELECT * FROM post WHERE id = $post_id ");
    $post = mysqli_fetch_assoc($post);
    if (isset($_SESSION['message']))
            {
            $message = $_SESSION['message'];
            echo $message;
            unset($_SESSION['message']);
            }
?>

<!DOCTYPE html>
<html>
    <head>
	<title>Forum</title>
    <meta charset="utf-8">
    <link rel = "stylesheet" href="css/main.css">
</head>
<body>
    <h1>Обновление поста</h1>
    <div class ="gl">
        <div class="form">
            <form action="update_post.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$post['id']?>">
                <label>Логин:</label><br>
                <input type="text" class="login" name ="login" value="<?=$post['login']?>"><br>
                <textarea name="post"><?=$post['text']?></textarea>
                <input type="file" Value="Изображение" name="img" style="margin: 10px;">
                <br>
                <input type="Submit" Value="Изменить" class="button">
                <input type="reset" Value="Очистить" class="button">
            </form>
        </div>

    </div>
</body>
</html>
