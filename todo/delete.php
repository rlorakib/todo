<?php
include "database.php";
?>

<?php

if(isset($_GET['delete']) && !empty($_GET['delete'])){
     $id = $_GET['delete'];
     $del = "DELETE FROM love WHERE id=$id ";
     mysqli_query($con, $del);
     header("location:form.php");
}
?>
<?php


if($_GET['delete_all']==1){
     if(isset($_GET['delete_all'])){
          $db = "DELETE FROM love";
          mysqli_query($con, $db);
          header("location:form.php");
     }else{
          echo "Sorry, No more data!";
}
}

?>