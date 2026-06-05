<?php
    // Database connection parameters
    $host = 'localhost';
    $username = 'root';
    $password = 'Younis@1911';
    $db_name = 'todo_app';

    $conn = mysqli_connect($host, $username, $password);


    $sql = "CREATE DATABASE IF NOT EXISTS `todo_app` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";

    mysqli_query($conn, $sql);
    
    mysqli_close($conn);

    //create table
    $host = 'localhost';
    $username = 'root';
    $password = 'Younis@1911';
    $db_name = 'todo_app';

    $conn = mysqli_connect($host, $username, $password, $db_name);

    $sql = "CREATE TABLE IF NOT EXISTS `tasks` (
        `id` INT(11) PRIMARY KEY AUTO_INCREMENT,
        `title` VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

    $result = mysqli_query($conn, $sql);