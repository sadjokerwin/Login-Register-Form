<?php
session_start();
include 'DbConnection.php';

$secret = '6Lc6DHIoAAAAAKlUJ-uHmoRC8noPq8x_EgJJuiLO';
$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
$responseData = json_decode($verifyResponse);

// if ($responseData->success)
//  {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstName = $_POST['firstName'];

        $lastName = $_POST['lastName'];

        $username = $_POST['username'];

        $password = $_POST['passwordOriginal'];

        $passwordConfirm = $_POST['passwordConfirm'];

        $email = $_POST['email'];
        if ($password != $passwordConfirm) {
            header("Location: Register.php?error=Passwords do not match");
            exit();
        } else {
            $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username ,firstName, lastName, password, email) VALUES ('$username','$firstName', '$lastName',  '$passwordHashed', '$email')";
            $sqlRun = mysqli_query($conn, $sql);
            header("Location: Login.php");
            exit();
        }
    }
// } else {
//     exit();
// }

// else header("Location: yes.php");
// }
// else
// header("Location: adminPage.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling.css">
    <title>Registration</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>

    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <div class="registration-form">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            First Name: <input type="text" placeholder="First Name" id="firstName" name="firstName" required>
            Last Name: <input type="text" placeholder="Last Name" id="lastName" name="lastName" required>
            Username: <input type="text" placeholder="Username" id="username" name="username" required>
            Password: <input type="password" placeholder="Password" id="passwordOriginal" name="passwordOriginal" required>
            Confirm Password: <input type="password" placeholder="Confirm password" id="passwordConfirm" name="passwordConfirm" required>
            E-mail: <input type="text" placeholder="email" id="email" name="email" required>
            <div class="g-recaptcha" data-sitekey="6Lc6DHIoAAAAAJTeRNgBXD3_uNKzrZBuz63AQgz6"></div>
            <button type="submit" id="register" name="register"> Register</button>
            <p>Have an account! <a href="Login.php">Login</a>.</p>
        </form>
    </div>
    </div>
</body>