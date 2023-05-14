<?php
$host="localhost";
$user="root";
$pass="";
$db="projekt";

$con=mysqli_connect($host,$user,$pass,$db);
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>

<body>

<div>
    <form action="" method="POST">
        <input type="text" name="name"
               placeholder="name"> <br> <br>

        <input type="text" name="text"
               placeholder="text"> <br> <br>

        <input type="text" name="video"
               placeholder="obrazok"> <br> <br>

        <input type="submit" name="save_btn"
        value="Save">

        <button> <a href="view.php">View</a></button>
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