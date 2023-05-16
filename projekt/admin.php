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
<html>
<head>
    <title></title>
</head>

<body>
<h1>Vitaj <?php echo $row["username"];?></h1>

<div>
    <form action="" method="POST">

        <div class="col-md-4">
            <label for="validationDefault01" class="form-label">Meno</label>
            <input type="text" name="name"
                   class="form-control" id="validationDefault01" placeholder="Zadajte meno" required>
        </div> <br> <br>

        <div class="col-md-4">
            <label for="validationDefault02" class="form-label">Priezvisko</label>
            <input type="text" name="text" class="form-control" id="validationDefault02"
                   placeholder="Zadajte priezvisko" required>
        </div> <br><br>

        <div class="col-md-4">
            <label for="validationDefault02" class="form-label">Priezvisko</label>
            <input type="file" name="video" class="form-control" id="validationDefault02"
                   accept=".jpg, .png, .jpeg"
                   placeholder="Zadajte priezvisko" required>
        </div> <br><br>

        <input type="submit" name="save_btn"
        value="Save">

        <button> <a href="view.php">View</a></button>
        <button> <a href="welcome.php">Logout</a></button>
    </form>

</div>

<?php
if(isset($_POST["save_btn"])){
    $meno=$_POST["name"];
    $popis=$_POST["text"];
    $obrazok=$_POST["video"];

    $query="INSERT INTO entita(name,text,video) VALUES ('$meno','$popis','$obrazok')";
    $data=mysqli_query($con,$query);

    if ($data){
        ?>
        <script type="text/javascript">
            alert("Data sa uspesne ulozili");
        </script>
        <?php
    }
    else{
        ?>
        <script type="text/javascript">
            alert("Skuste to znovu prosim");
        </script>
        <?php
    }
}
?>

</body>


</html>