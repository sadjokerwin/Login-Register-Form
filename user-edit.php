<?php
session_start();
require 'DbConnection.php';
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
    if(isset($_GET['username']))
        {
            
            $user_Username = $_GET['username'];
            $query = "SELECT * FROM users WHERE username = '$user_Username' " ;
            $query_run = mysqli_query($db, $query);
            if(mysqli_num_rows($query_run) > 0)
            {
                $users= mysqli_fetch_array($query_run);
                ?>

       
        <form name="register" method="post" action="RegistrationPage.php">
            <div class="registration-form">
                <!-- <label for="username">Username</label> -->
                <input type="text"  value="<?=$users['firstName'];?>"  name="firstName" required>
                <input type="text"  value="<?=$users['lastName'];?>"  name="lastName" required>
                <input type="text"  value="<?=$users['username'];?>"  name="username" required>
                <input type="password" value="<?=$users['password'];?>" name="passwordOriginal" required>
                <input type="password"  value="<?=$users['password'];?>"  name="passwordConfirm"
                    required>
                <input type="text" value="<?=$users['email'];?>" name="email" required>
                <button type="submit" id="updateUser" name="updateUser"> Update</button>

                
            </div>
                </form>
                         <?php
            }
        }
        else
        {
            echo "No record found";
        }
        ?>
            <script src="registration_form.js">

            </script>
            <div>



            </div>
    </body>

</html>