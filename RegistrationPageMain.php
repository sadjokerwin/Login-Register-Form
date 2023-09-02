<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styling.css">
        <title>Registration</title>

    </head>
    <body>
        <form name="register" method="post" action="RegistrationPage.php">
             <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
            <div class="registration-form">
                <input type="text" placeholder="First Name" id="firstName" name="firstName" required>
                <input type="text" placeholder="Last Name" id="lastName" name="lastName" required>
                <input type="text" placeholder="Username" id="username" name="username" required>
                <input type="password" placeholder="Password" id="passwordOriginal" name="passwordOriginal" required>
                <input type="password" placeholder="Confirm password" id="passwordConfirm" name="passwordConfirm"
                    required>
                <input type="text" placeholder="email" id="email" name="email" required>
                <button type="submit" id="register" name="register"> Register</button>
                <button type="submit" id="login" name="login"> Login</button>


            </div>
    </body>

</html>