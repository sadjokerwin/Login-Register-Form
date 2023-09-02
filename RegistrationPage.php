<?php
session_start();
require_once('DbConnection.php');
if(isset($_POST['updateUser']))
{
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $password = $_POST['passwordOriginal'];
    $email = $_POST['email'];
    $query = "UPDATE users SET firstName='$firstName', lastName='$lastName', username='$username', password='$password', email='$email' WHERE username='$username' ";
    $query_run = mysqli_query($db, $query);
    if($query_run)
    {
        header("Location: adminPage.php");
        exit(0);
    }
    else
    {
        header("Location: kur.php");
        exit(0);
    }
}
$firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $password = $_POST['passwordOriginal'];
    $passwordConfirm = $_POST['passwordConfirm'];
    $email = $_POST['email'];
    if (mysqli_num_rows(mysqli_query($db, "SELECT * FROM users WHERE username='{$username}'")) > 0 || mysqli_num_rows(mysqli_query($db, "SELECT * FROM users WHERE email='{$email}'")) > 0)
    {
        header("Location: RegistrationPageMain.php?error=Username or email already exists");
        exit();
    }
    else if($password != $passwordConfirm)
    {
        header("Location: RegistrationPageMain.php?error=Passwords do not match");
        exit();
    }
    else
    {
        $sql = "INSERT INTO users (firstName, lastName, username, password, email) VALUES ('$firstName', '$lastName', '$username', '$password', '$email')";
        $sqlRun = mysqli_query($db, $sql);
        header("Location: basePageLogin.php");
    exit();
     }

?>