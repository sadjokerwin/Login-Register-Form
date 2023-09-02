<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling.css">
    <title>Document</title>
</head>
<body>
    <div class = "login-form">
        <form action="LoginPage.php" method="post">
        <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
        <input type="text" placeholder="Username" id="username" name="username" required>
        <input type="password" placeholder="Password" id="password" name="password" required>
        <button type="submit" id = "login" name = "login"> Login</button>
        <button type="submit" id="register" name="register"> Register</button>
        </form>
    
    </div>
</body>
</html>