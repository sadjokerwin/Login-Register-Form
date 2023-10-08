<?php
session_start();
include "DbConnection.php";
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username = '$username' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['username'] === $username) {
        if (password_verify($password, $row['password'])) {

            $_SESSION['username'] = $row['username'];
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['lastName'] = $row['lastName'];
            header("Location: home.php");
            exit();
        } else {
            $_SESSION['loginAttempts'] += 1;
            header("Location: Login.php?error=Incorrect password");
        }
        } else {
            $_SESSION["'loginAttempts'"] += 1;

            header("Location: Login.php?error=Incorrect username or password");

            exit();
        }
    } else {
        $_SESSION['loginAttempts'] += 1;

        header("Location: Login.php?error=Incorrect username or password");

        exit();
    }
}
?>
 

 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling.css">
    <title>Document</title>
</head>

<body>
    <div class="login-form">
        <form action="" method="post">
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <input type="text" placeholder="Username" id="username" name="username" required>
            <input type="password" placeholder="Password" id="password" name="password" required>
            <button type="submit" id="login" name="login"> Login</button>

            <p>Don't have an account? <a href="Register.php">Register </a>.</p>

        </form>

    </div>
</body>

</html>