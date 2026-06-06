<?php
session_start();

$host = 'localhost';
$username = 'root';
$password = 'Younis@1911';
$db_name = 'todo_app';

$conn = mysqli_connect($host, $username, $password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title'])) {
    $title = trim(htmlspecialchars($_POST['title']));
    $sql = mysqli_prepare($conn, "INSERT INTO `tasks` (`title`) VALUES (?)");
    mysqli_stmt_bind_param($sql, "s", $title);
    $result = mysqli_stmt_execute($sql);

    if ($result) {
        $_SESSION['success'] = 'Task added successfully';
    }
    header('Location: ../design/index.php');
    exit;
} else {
    header('Location: ../design/index.php');
    exit;
}
