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

$sql = "SELECT * FROM `tasks`";
$stmt = mysqli_query($conn, $sql);
$result = mysqli_fetch_all($stmt, MYSQLI_ASSOC);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>TO-DO APP</title>
</head>

<body>



    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success text-center my-3"> <?= $_SESSION['success'] ?> </div>
                <?php
                    unset($_SESSION['success']);
                endif; ?>
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="alert alert-danger text-center my-3"> <?= $_SESSION['error'] ?> </div>
                <?php
                    unset($_SESSION['error']);
                endif; ?>
                <form action="../handlers/storeTask.php" method="POST" class="form border p-2 my-5">
                    <input type="text" name="title" class="form-control my-3 border border-success" placeholder="add new todo">
                    <input type="submit" value="Add" class="form-control btn btn-primary my-3 " placeholder="add new todo">
                </form>

            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th>NUM</th>
                            <th>TASK</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $index => $task) : ?>
                            <tr>
                                <td class="text-center"><?= $index + 1 ?></td>
                                <td><?= $task['title'] ?></td>
                                <td class="text-center">
                                    <a href="update.php?id=<?= $task['id'] ?>" class="btn btn-sm btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="../handlers/deleteTask.php?id=<?= $task['id'] ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>

</html>