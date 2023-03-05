<?php
include "database.php";
?>

<?php

if(isset($_GET['delete']) && !empty($_GET['delete'])){
     $id = $_GET['delete'];
     $del = "DELETE FROM Todo WHERE id=$id ";
     mysqli_query($con, $del);
     header("location:insert.php");
}

?>