<?php
include "database.php";
?>



 <?php
 $td = mysqli_query($con, "SELECT * FROM Todo");

    if(mysqli_num_rows($td)> 0){
        while($row =mysqli_fetch_assoc($td)){
            echo "id -",$row['id']."  task -", $row['task']."<input type='submit' value='delete' name='delete'>","<input type='submit' value='update' name='update'>","<br>";
            
            }
    }else{
        echo "0 result";
    }

    mysqli_close($con);
    ?>