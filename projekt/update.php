<?php
$host="localhost";
$user="root";
$pass="";
$db="projekt";

$con=mysqli_connect($host,$user,$pass,$db);

$id=$_GET['id'];
$select="SELECT * FROM entita WHERE id='$id'";
$data=mysqli_query($con,$select);
$row=mysqli_fetch_array($data);
?>

<div>
    <form action="" method="POST">
        <input value= "<?php echo $row['name']?>"
        type="text" name="name"
               placeholder="name"> <br> <br>

        <input value= "<?php echo $row['text']?>"
               type="text" name="text"
               placeholder="text"> <br> <br>

        <input value= "<?php echo $row['video']?>"
            type="file" name="video"
               id="video" accept=".jpg, .png, .jpeg"
               value=""> <br> <br>

        <input type="submit" name="update_btn"
               value="Update">

        <button> <a href="view.php">Back</a></button>
    </form>

</div>
<?php
if(isset($_POST['update_btn'])){
    $meno=$_POST["name"];
    $popis=$_POST["text"];
    $obrazok=$_POST["video"];

    $update="UPDATE entita SET name='$meno'
            , text='$popis', video='$obrazok' WHERE id='$id' ";
    $data=mysqli_query($con,$update);

    if ($data){
        ?>
        <script type="text/javascript">
            alert("Data sa uspesne zmenili");
            window.open("http://localhost/projekt/view.php","_self")
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
