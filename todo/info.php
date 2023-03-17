<?php
include "database.php";
session_start();

if($_SESSION['role']!=1){
   header("location:login.php");
}
?>
<html>
    <body>
        <h1>User Details :</h1>

<?php
$b = $_GET['ui'];
$a = "SELECT * FROM login WHERE Id='$b' ";
$c = mysqli_query($con,$a);
$d = mysqli_fetch_assoc($c);
?>
  <ul>
    <li><?php echo "ID : ",$d['Id']; ?></li>
    <li><?php echo "Username : ",$d['Username'];?></li>
    <li><?php echo "Phone :",$d['Phone'];?></li>
    <li><?php echo "Email : ",$d['Email'];?></li>

   </ul> 


</body>
</html>
