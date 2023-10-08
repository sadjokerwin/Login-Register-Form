<?php 
session_start();

if (isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) {

 ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styling2.css">
        <title>Logged In</title>
    </head>

    <body>
        <div>
            <h1>Hello,  <?php
            echo $_SESSION['firstName'] . " " . $_SESSION['lastName'] . "!"; 
            ?> 
            </h1>
            <a href="Logout.php">Logout</a>
            </form>
        </div>
    </body>

</html>
<?php 
}else{
     header("Location: Login.php");
     exit();
}
 ?>
