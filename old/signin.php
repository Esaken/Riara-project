

<form action="signin.php" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email">
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">

    <input type="submit" value="Sign In">
 </form>




 <?php
session_start();

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $connection = mysqli_connect("localhost","ksau23#!","Haemo99#!","e-shop");

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        $_SESSION['type'] = $row['type'];
        header("Location: index.php");
    } else {
        echo "Invalid credentials. Please try again.";
    }
}
?>


