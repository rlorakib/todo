<?php 
include "database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo list</title>
</head>
<body>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
       Task: <input type="text" name="submit" >
      <input type="submit" value="submit" link="insert.php">
     
</form>
<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $task = $_POST['submit'];
    if(empty($task)){
        echo "<p style='color:red'>Sorry please fill in box </p>";
       
    }else{
       mysqli_query($con,"INSERT INTO Todo(task) values('$task')");
       
    }
}
?>
</body>
</html>





