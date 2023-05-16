<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
$host="localhost";
$user="root";
$pass="";
$db="projekt";

$con=mysqli_connect($host,$user,$pass,$db);

if(!empty($_SESSION["id"])){
    $id=$_SESSION["id"];
    $result=mysqli_query($con,"SELECT * FROM reglog WHERE id=$id");
    $row=mysqli_fetch_assoc($result);
}
else{

    header("Location: login.php?error=nieste_prihlaseny");
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title>Welcome page</title>
    </head>

    <body>
        <h1>Chcete sa odhlasit <?php echo $row["username"];?>?</h1>
        <button><a href="logout.php">Logout</a></button>
        <button><a href="admin.php">Back</a></button>
    </body>
</html>
