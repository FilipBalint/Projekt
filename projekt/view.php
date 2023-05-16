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

<table border="1px" cellpadding="10px" cellspacing="0">
    <tr>
        <th>Meno</th>
        <th>Popis</th>
        <th>Meno obrazku</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php
    $query="SELECT * FROM entita";
    $data=mysqli_query($con,$query);
    $result=mysqli_num_rows($data);
    if ($result){
        while ($row=mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $row['name']; ?>
                </td>
                <td><?php echo $row['text']; ?>
                </td>
                <td><?php echo $row['video']; ?>
                </td>
                <td><a href="update.php?id=<?php echo $row['id']; ?>">Edit</a></td>

                <td><a onclick="return confirm('Ste si isty ze chcete vymazat?')"
                       href="delete.php?id=<?php echo $row['id']?>">Delete</a></td>
            </tr>
            <?php
        }
    }
    ?>



</table>
<button> <a href="admin.php">Admin</a></button>
