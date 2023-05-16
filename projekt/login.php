<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
$host="localhost";
$user="root";
$pass="";
$db="projekt";

$con=mysqli_connect($host,$user,$pass,$db);

if(isset($_POST["submit"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    $result=mysqli_query($con,"SELECT * FROM reglog WHERE username='$username'");
    $row=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0){
        if($password == $row["password"]){
            if(session_status() !== PHP_SESSION_ACTIVE) session_start();
            $_SESSION["login"]= true;
            $_SESSION["id"]= $row["id"];
            header("Location: admin.php");
        }
        else{
            echo
            "<script> alert('Heslo je nespravne');</script>";
        }

    }
    else{
        echo
        "<script> alert('Username je nespravny alebo neexistuje');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
<h1>Login</h1>
<form class="" action="" method="POST" autocomplete="off">
    <label for="username">Username :</label>
    <input type="text" name="username" id="username" required value=""> <br>

    <label for="password">Password :</label>
    <input type="password" name="password" id="password" required value=""> <br>
    <button type="submit" name="submit">Login</button>
</form>
<br>
    <button> <a href="reg.php">Register</a></button>
</body>
</html>