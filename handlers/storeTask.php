<?php

    include_once '../Database/connection.php';
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title'])) {
        $title = trim(htmlspecialchars(htmlentities($_POST['title'])));
        $sql = "INSERT INTO `tasks` (`title`) VALUES ('$title')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('Location: ../design/index.php');
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        header('Location: ../design/index.php');
    }