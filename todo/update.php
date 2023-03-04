<?php
include "database.php";
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
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        Task: <input type="text" name="task" placeholder="new data submit" >
        <input type="submit" value="submit">
        
        
    </form>
   <?php
   $erro='';
$id = $_GET['update'];
    

if($_SERVER['REQUEST_METHOD']=='POST'){
    $new= $_POST["task"];
    
}else{
    echo "Error";
}
if(isset($new)){
    if(empty($new)){
        echo '<p style="color:red">Sorry please enter new text here</p>';
    }else{
        $data = $new ;
        $task = "UPDATE Todo SET task=$data WHERE id=$id";
        mysqli_query($con, $task);
        header("location:insert.php");
    }
}
?> 
</body>
</html>
