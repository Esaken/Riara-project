


<form action="signup.php" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email">

    <label for="password">Password:</label>
    <input type="password" id="password" name="password">

    <label for="type">Account Type:</label>
    <select id="type" name="type">
        <option value="customer">Customer</option>
        <option value="admin">Admin</option>
    </select>

    <input type="submit" value="Sign Up">
</form>


<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    $connection = mysqli_connect("localhost","ksau23#!","Haemo99#!","e-shop");
    $query = "INSERT INTO users (email, password, type) VALUES ('$email', '$password', '$type')";
    $result = mysqli_query($connection, $query);
    
    if($result){
        echo "Account created successfully.";
    } else {
        echo "Error creating account. Please try again.";
    }
    
}
?>

