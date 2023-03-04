<?php
include "database.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert data</title>
</head>
<body>
     <tbody>
   <?php
 $td = mysqli_query($con, "SELECT * FROM Todo");
 
if(mysqli_num_rows($td)> 0){
    while($row =mysqli_fetch_assoc($td)){
       ?>
       <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['task'];?></td>
        <td><a class="btn btn-info" href="update.php?update=<?php echo $row['id'];?>"><button>Update</button></a>--<a class="btn btn-info" href="delete.php?delete=<?php echo $row['id'];?>"><button>Delete</button></a></td><br>
         </tr> 
       <?php } } ?>

</tbody>

 
</body>
</html>

