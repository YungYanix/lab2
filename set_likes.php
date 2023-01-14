<?php
	require_once 'connect.php';

	$id = $_GET['id'];

	$q = "SELECT * FROM `post` WHERE `id` = '$id'";
	$result = mysqli_query($connect, $q);
	$post = $result->fetch_assoc();
	$likes = (int)$post['likes'] + 1;

	$q = "UPDATE `post` SET `likes` = '$likes' WHERE `id` = '$id'";

	mysqli_query($connect, $q);

	header('Location:../index.php');
?>