<?php

    $connect = mysqli_connect('localhost', 'root', 'root', 'my_forum','8888');

    if (!$connect) {
        die('Error connect to DataBase');
    }
