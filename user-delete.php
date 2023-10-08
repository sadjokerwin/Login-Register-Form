<?php
session_start();
require 'DbConnection.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    echo 'qko';
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $password = $_POST['passwordOriginal'];
    $email = $_POST['email'];
    $sql = "DELETE FROM users WHERE username = '$username'";
    $sqlRun = mysqli_query($conn, $sql);
    if ($sqlRun) {
        header("Location: adminPage.php");
        exit(0);
    } else {
        exit(0);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student View</title>
</head>

<body>
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student View Details
                            <a href="adminPage.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['username'])) {
                            $user_Username = $_GET['username'];
                            $query = "SELECT * FROM users WHERE username = '$user_Username' ";
                            $query_run = mysqli_query($conn, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                $users = mysqli_fetch_array($query_run);
                        ?>

                                <div class="mb-3">
                                    <label>User's First Name</label>
                                    <p class="form-control">
                                        <?= $users['firstName']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>User's Last Name</label>
                                    <p class="form-control">
                                        <?= $users['lastName']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>User's Username</label>
                                    <p class="form-control">
                                        <?= $users['username']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>User's Email</label>
                                    <p class="form-control">
                                        <?= $users['email']; ?>
                                    </p>
                                </div>
                                <form name="register" method="post" action="">
                            <button type="submit" id="deleteUser" name="deleteUser" class="btn btn-danger btn-sm"> DeleteUser</button>
                        </form>

                        <?php
                            } else {
                                exit();
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>



                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>



    </div>
</body>

</html>