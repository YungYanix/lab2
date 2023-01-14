<?php
	require_once 'connect.php';

	$id = $_GET['id'];

	$q = "SELECT * FROM `post` WHERE `id` = '$id'";
	$result = mysqli_query($connect, $q);
	$post = $result->fetch_assoc();
	$dislikes = (int)$post['dislikes'] + 1;

	$q = "UPDATE `post` SET `dislikes` = '$dislikes' WHERE `id` = '$id'";

	mysqli_query($connect, $q);

	header('Location:../index.php');
?>