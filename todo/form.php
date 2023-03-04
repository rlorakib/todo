<?php 
include "database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Form</title>
</head>
<body>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
       <input type="text" placeholder="Enter something task...." name="submit" >
      <button type="submit" value="submit">Submit</button>
     
</form>
<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $task = $_POST['submit'];
    if(empty($task)){
        echo "<p style='color:red'>Sorry please fill in box </p>";
       
    }else{
       mysqli_query($con,"INSERT INTO Todo(task) values('$task')");
       header("location:insert.php");
    }
}
?>
</body>
</html>





