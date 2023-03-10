<?php
include "database.php";
session_start();
if(!isset($_SESSION['role'])){
    header("location:login.php");
}
?> 

<?php
 
$id = $_GET['update'];
  
$sql = "SELECT * FROM Todo WHERE id=$id ";
$result = mysqli_query($con,$sql);
$da = mysqli_fetch_array($result);


if(!empty($_POST['submit'])){
    $new= $_POST["submit"];
    
}else{
    echo null;
}


if(isset($new)){
    if(!empty($new)){
        $task = "UPDATE Todo SET task='$new' WHERE id=$id ";
        mysqli_query($con, $task);
        header("location:form.php");
    }else{
        echo "Sorry, Please enter new text!";
    }
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update data</title>
</head>
<style>
    body{
    background-color: #66ffe0;
} 
</style>
<body>
    <form action="" method="post">
        <input type="text" name="submit" value="<?php echo $da['task'];?>">
        <input type="submit" value="submit">
    </form>
 
</body>
</html>
