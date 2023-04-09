<?php
include "database.php";
session_start();
if(!isset($_SESSION['role'])){
    header("location:login.php");
}
?> 

<?php
 
class update{
    public function query($con){
        $this->con = $con;
        $this->id = $_GET['update'];
        $sql= mysqli_query($this->con,"SELECT * FROM love WHERE id=$this->id");
        $da = mysqli_fetch_array($sql);
        $GLOBALS['Task'] = $da['Task'];

    }
    public function done(){
        $new = $_POST['submit'];
        $task = "UPDATE love SET task='$new' WHERE id=$this->id";
        mysqli_query($this->con, $task);
        header("location:form.php");
    }
}
$update = new update();
$update->query($con);
if(!empty($_POST['submit'])){
    $update->done();
}

/*
$id = $_GET['update'];
  
$sql = "SELECT * FROM love WHERE id=$id ";
$result = mysqli_query($con,$sql);
$da = mysqli_fetch_array($result);


if(!empty($_POST['submit'])){
    $new= $_POST["submit"];
    
}else{
    echo null;
}


if(isset($new)){
    if(!empty($new)){
        $task = "UPDATE love SET task='$new' WHERE id=$id ";
        mysqli_query($con, $task);
        header("location:form.php");
    }else{
        echo "Sorry, Please enter new text!";
    }
}
*/
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
        <input type="text" name="submit" value="<?php echo $GLOBALS['Task'];?>">
        <input type="submit" value="submit">
    </form>
 
</body>
</html>
