 <?php
include "DbConnection.php";
    session_start();

    $uname = $_POST['username'];
    $pass = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$pass'";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) === 1)
    {
        $row = mysqli_fetch_assoc($result);
        if($row['username'] === $uname && $row['password'] === $pass)
        {
            $_SESSION['username'] = $row['username'];
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['lastName'] = $row['lastName'];
            header("Location: home.php");
            exit();
        }
        else
        {
        header("Location: basePageLogin.php?error=Incorrect Username or Password");
        exit();
    }
    }
    else
    {
        header("Location: basePageLogin.php?error=Incorrect Username or Password");
        exit();
    }

exit();
?>