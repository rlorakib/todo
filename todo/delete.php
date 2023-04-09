<?php
include "database.php";
session_start();
if(empty($_SESSION['role'])){
     header("location:login.php");
}
?>

<?php
class delete{
 public function delete($con){
     $this->con = $con;
     $id = $_GET['delete'];
     $del = "DELETE FROM love WHERE id=$id";
     mysqli_query($this->con,$del);
     header("location:form.php");
 }

 public function delete_all(){
     $db = "DELETE FROM love";
     mysqli_query($this->con, $db);
     header("location:form.php");
 }
}
 $del = new delete();
 $del->delete($con);
 if($_GET['delete_all'] == 1){
     $del->delete_all();
 }
 /*
if(isset($_GET['delete']) && !empty($_GET['delete'])){
     $id = $_GET['delete'];
     $del = "DELETE FROM love WHERE id=$id ";
     mysqli_query($con, $del);
     header("location:form.php");
}

if($_GET['delete_all']==1){
     if(isset($_GET['delete_all'])){
          $db = "DELETE FROM love";
          mysqli_query($con, $db);
          header("location:form.php");
     }else{
          echo "Sorry, No more data!";
}
}
*/
?>