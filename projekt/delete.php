<?php
$host="localhost";
$user="root";
$pass="";
$db="projekt";

$con=mysqli_connect($host,$user,$pass,$db);

$id=$_GET['id'];
$query="DELETE FROM entita WHERE id='$id'";
$data=mysqli_query($con,$query);
if ($data){
    ?>
<script type="text/javascript">
    alert("DELETED")
    window.open("http://localhost/projekt/view.php","_self");
</script>
<?php
}
else{
?>
<script type="text/javascript">
    alert("Try it again")
</script>
<?php
}
?>
