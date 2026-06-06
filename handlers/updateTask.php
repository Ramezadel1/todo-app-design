<?php
session_start();


$host = 'localhost';
$username = 'root';
$password = 'Younis@1911';
$db_name = 'todo_app';

$conn = mysqli_connect($host, $username, $password, $db_name);
if (!$conn) {
    echo "connect error " . mysqli_connect_error($conn);
}



if ($_SERVER['REQUEST_METHOD']  == "POST" && isset($_POST['title'])) {

    $title = trim(htmlspecialchars(htmlentities($_POST['title'])));
    $id = $_GET['id'];

    // echo $title;

    if (strlen($title) < 3) {
        $_SESSION['errors'] = "title of task must be greater than 3 chars ";
    }


    if (empty($_SESSION['errors'])) {
        $sql = "UPDATE `tasks` SET `title`='$title' WHERE `id` = $id ";
        $result = mysqli_query($conn, $sql);
        // echo mysqli_affected_rows($conn);
        if ($result) {
            $_SESSION['success'] = "data updated succefully";
        }
    } else {
        header("location:../design/update.php?id=$id");
        die;
    }


    // redirection 
    header("location:../design/index.php");
}
