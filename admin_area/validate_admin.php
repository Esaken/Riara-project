<?php
session_start();

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $connection = mysqli_connect("localhost","ksau23#!","Haemo99#!","e-shop");
    $query = "SELECT * FROM admin_users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 1){
        $_SESSION['email'] = $email;
        header("Location: admin.php");
    } else {
        echo "Invalid credentials. Please try again.";
    }
}
?>
