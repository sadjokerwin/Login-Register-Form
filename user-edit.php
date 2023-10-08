<?php
session_start();
require 'DbConnection.php';
if (isset($_POST['updateUser'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName']; 
    $username = $_POST['username'];
    $password = $_POST['passwordOriginal'];
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $sql = "UPDATE users SET username='$username', firstName='$firstName', lastName='$lastName', password='$passwordHashed', email='$email' WHERE username='$username'";
    // -- $query = "UPDATE users SET firstName='$firstName', lastName='$lastName', username='$username', password='$password', email='$email' WHERE username='$username' ";

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling.css">

</head>

<body>
    <?php
    if (isset($_GET['username'])) {

        $user_Username = $_GET['username'];
        $query = "SELECT * FROM users WHERE username = '$user_Username' ";
        $query_run = mysqli_query($conn, $query);
        if (mysqli_num_rows($query_run) > 0) {
            $users = mysqli_fetch_array($query_run);
    ?>


            <form name="register" method="post" action="    ">
                <div class="registration-form">
                    <!-- <label for="username">Username</label> -->
                    First Name: <input type="text" value="<?= $users['firstName']; ?>" name="firstName" required>
                    Last Name: <input type="text" value="<?= $users['lastName']; ?>" name="lastName" required>
                    Username: <input type="text" value="<?= $users['username']; ?>" name="username" required>
                    Password: <input type="password" value="<?= $users['password']; ?>" name="passwordOriginal" required>
                    Confirm Password: <input type="text" value="<?= $users['email']; ?>" name="email" required>
                    E-mail: <input type="text" value="<?= $users['isLocked']; ?>" name="isLocked" required>
                    <button type="submit" id="updateUser" name="updateUser"> Update</button>


                </div>
            </form>
    <?php
        }
    } else {
        echo "No record found";
    }
    ?>
    <script src="registration_form.js">

    </script>
    <div>



    </div>
</body>

</html>