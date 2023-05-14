<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "projekt";
$con = mysqli_connect($host, $user, $pass, $db);

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    try {
        $request = mysqli_query($con, "SELECT id,username,email,password FROM reglog WHERE username='$username'");
        foreach ($request as $user){
            if($user["password"] == $password){
                $_SESSION["login"]= true;
                $_SESSION["id"]= $user["id"];
                header("location: welcome.php");
            }else{

                header("location: login.php?error=nespravne_heslo");
            }
        }
    } catch (Exception $e) {
        echo "Connection to sql faild: " . $e->getMessage();
    }
}

?>

