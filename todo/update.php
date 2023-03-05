<?php
include "database.php";
?> 

<?php
 
$id = $_GET['update'];
 echo "Your old data -id:".$id;   

$sql = "SELECT task FROM Todo WHERE id=$id ";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)> 0){
    while($row =mysqli_fetch_assoc($result)){
       echo " task:".$row['task'];

    }
}
if(isset($_REQUEST['submit'])){
    $new= $_REQUEST["submit"];
    echo $new;
    
}else{
    echo null;
}
if(isset($new)){
    if(empty($new)){
        echo '<p style="color:red">Sorry please enter new text here</p>';
    }
}

if(!empty($new)){
    $task = "UPDATE Todo SET task='$new' WHERE id=$id ";
    mysqli_query($con, $task);
    header("location:insert.php");
}


?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="submit" placeholder="Enter new text here....">
        <input type="submit" value="submit">
    </form>
 
</body>
</html>
