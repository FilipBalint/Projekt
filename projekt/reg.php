<?php
$host="localhost";
$user="root";
$pass="";
$db="projekt";

$con=mysqli_connect($host,$user,$pass,$db);
require 'config.php';
if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password= $_POST["password"];
    $confirmpassword=$_POST["confirmpassword"];
    $duplicate=mysqli_query($con,"SELECT * FROM reglog WHERE username= '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate)>0){
        echo
        "<script> alert('Username alebo Email uz je obsadeny');</script>";
    }
    else{
        if($password == $confirmpassword){
            $query ="INSERT INTO reglog VALUES ('','$username','$email','$password')";
            mysqli_query($con,$query);
            echo
            "<script> alert('Registracia prebehla uspesne');</script>";
        }
        else{
            echo
            "<script> alert('Heslo sa nezhoduje');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title>Registracia</title>
    </head>

    <body>
        <h1>Registracia</h1>
        <form class="" action="" method="post" autocomplete="off">
            <label for="username">Username :</label>
            <input type="text" name="username" id="username" required value=""> <br>

            <label for="email">Email :</label>
            <input type="text" name="email" id="email" required value=""> <br>

            <label for="password">Password :</label>
            <input type="password" name="password" id="password" required value=""> <br>

            <label for="confirmpassword">Confirm Password :</label>
            <input type="password" name="confirmpassword" id="confirmpassword" required value=""> <br>
            <button type="submit" name="submit">Register</button>
        </form>
        <br>
        <a href="login.php">Login</a>
        </body>
</html>
