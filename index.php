<?php
	require_once 'connect.php';
    session_start();

	if (isset($_POST['liked'])) {
		$post_id = $_POST['postid'];
		$result = mysqli_query($connect, "SELECT * FROM post WHERE id = $post_id");
		$row = mysqli_fetch_array($result);
		$like = $row['likes'];
        if ($like < 0){
            $like = 0;
        }

		mysqli_query($connect, "INSERT INTO likes (postid) VALUES ($post_id)");
		mysqli_query($connect, "UPDATE post SET likes = $like + 1 WHERE id = $post_id");

		echo $like + 1;
		exit();
	}

    if (isset($_POST['unliked'])) {
		$post_id = $_POST['postid'];
		$result = mysqli_query($connect, "SELECT * FROM post WHERE id = $post_id");
		$row = mysqli_fetch_array($result);
		$like = $row['likes'];
        if ($like < 0){
            $like = 0;
        }

		mysqli_query($connect, "DELETE FROM likes WHERE postid = $post_id");
		mysqli_query($connect, "UPDATE post SET likes = $like - 1 WHERE id = $post_id");

		echo $like - 1;
		exit();
	}
//Пагинация
	$post = mysqli_query($connect, "SELECT * FROM `post` ORDER BY `id` DESC");
    $posts = mysqli_fetch_all($post);

    $total = count($posts);
    $per_page = 5;
    $count_page = ceil( $total / $per_page );
    $page = $_GET['page']??1;
    $page = (int)$page;

    if(!$page || $page < 1){
        $page = 1;
    } else if ($page > $count_page) {
        $page = $count_page;
    }
    $start = ($page - 1) * $per_page;
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

</head>
<body>
    <h1>Форум</h1>
    <div class ="gl">
        <div class="form">
            <form action="post.php" method="POST" enctype="multipart/form-data">
                <label>Логин:</label><br>
                <input type="text" class="login" name ="login"><br>
                <label>Пост:</label><br>
                <textarea name="post"></textarea>
				<input type="file" Value="Изображение" name="img" style="margin: 10px;">
                <br>
                <input type="Submit" Value="Опубликовать" class="button1">
                <input type="reset" Value="Очистить" class="button2">
            </form>
        </div>
    <h2>Посты</h2>
        <?php
        		$posts = array_slice($posts, $start, $per_page);
        		foreach ($posts as $post) {
        			?>
        			<div class="post">
                    	<div class="user">
                        	<?php echo $post[1]; ?>
                    	</div>

                    	<div class="text">
                        	<?php echo $post[2]; ?><br>
        					<?php
        					if (!empty($post[4])){
        						?>
        						<img src="<?php echo $post[4] ?>" width="50%" alt=""
        						style="border-radius: 8px; margin-left: auto; margin-right: auto; display: block;"/>
        					<?php } ?>
        					<div class="update"
        					style="font-weight: bold; margin-top: 15px;">
        						<a href="update.php?id=<?=$post[0]?>" style="text-decoration: none;">Изменить</a>
        					</div>
        					<div class="delete"
        					style="font-weight: bold; margin-top: 5px;">
        						<a href="delete.php?id=<?=$post[0]?>" style="text-decoration: none;  color:rgba(194, 0, 0, 0.74);">Удалить</a>
        					</div>
                    	</div>
                    	<div style="margin-left: 45px; font-weight: bold;">
                        	<?php echo $post[3]; ?>
                    	</div>
                    	<div style="font-size: 20px; margin: 10px 15px;">


        					<span> Лайки: <?php echo $post[5]; ?> <a href="set_likes.php?id=<?=$post[0]?>" style = "color: green;">+</a></span>
                            <br>
                            <span>Дизлайки: <?php echo $post[6]; ?> <a href="set_dislikes.php?id=<?=$post[0]?>" style = "color: red;">-</a></span>
                    	</div>
        			</div>
        		<?php
        		}
                ?>
                <CENTER>
                    <?php
                    for ($i = 1; $i <= $count_page; $i++){
                        ?>
                        <a style="font-weight: bold"
                        href='?page=<?=$i?>'><?=$i?></a>
                        <?php
                    }
                    ?>
                </CENTER>
            </div>
        </body>
        </html>
</html>