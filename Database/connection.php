<?php
    $host = 'localhost';
    $username = 'root';
    $password = 'Younis@1911';
    $db_name = 'todo_app';

    $conn = mysqli_connect($host, $username, $password, $db_name);

    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}