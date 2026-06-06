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

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT * FROM `tasks` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        $_SESSION['error'] = 'Task not found';
        header('Location: ../design/index.php');
        exit;
    }

    $sql = mysqli_prepare($conn, "DELETE FROM `tasks` WHERE `id` = ?");
    mysqli_stmt_bind_param($sql, "i", $id);
    $result = mysqli_stmt_execute($sql);

    if(mysqli_affected_rows($conn) == 0) {
        $_SESSION['error'] = 'Task not found';
    }
    if ($result) {
        $_SESSION['success'] = 'Task deleted successfully';
    }
    header('Location: ../design/index.php');
    exit;
} else {
    header('Location: ../design/index.php');
    exit;
}