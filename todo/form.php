<?php 
include "database.php";
session_start();
if(!isset($_SESSION['role'])){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Form</title>
</head>
<style>
    table,tr,th,td{
        border: 1px solid black;
        border-collapse: collapse;
    }
    th,td{
        text-align: center;
    }
    th{
        background-color: #96D4D4;
    }
    body{
    background-color: #66ffe0;
    } 



</style>
<body>

<p style="text-align:right"><a href="logout.php?"><button style="color:red">Logout</button></a></p>

<h1 style="text-align:center;color:#ff4d94">Welcome to <?php echo $_SESSION['uname'];?> Form</h1>

<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<label for="submit">Task:</label><br>
       <input type="text" placeholder="Enter some task...." name="submit" >
      <button type="submit" value="submit">Submit</button><br><br>
  
</form>


 <?php if($_SESSION['role']==1){ ?>
    <a href="delete.php?delete_all=<?php echo 1;?>"><button style="color:red">Delete all</button></a>  
 <?php } ?>

<br><br>

<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $task = $_POST['submit'];
    if(empty($task)){
        echo "<p style='color:red'>Sorry please fill in box</p>";
       
    }else{
        $id = $_SESSION['id'];
        mysqli_query($con,"INSERT INTO love(Task,login_Id) values('$task',$id)");
        header("location:form.php");
    }
}


?>

<table style="width:30%">
    <tr>
        <th>Id</th>
        <th>Task</th><?php if($_SESSION['role']==1) { ?>
        <th>UserName</th>
        <?php } ?>
        <th colspan="2">Action</th>
        
    </tr>
    
<?php
$no='';
$x = 0;
$td = mysqli_query($con, "SELECT * FROM love ORDER BY id "); 

if(mysqli_num_rows($td)> 0){
    while($row =mysqli_fetch_array($td)){?>
       
        <tr>
            
        <?php if($_SESSION['id']==$row['login_Id'] || $_SESSION['role']==1){?> 
           
           <?php if($x<$row['id']){?>
              <?php  $x += 1; ?>
         
           <td><?php print($x) ; ?></td>
           <?php } ?> 

        <td><?php echo $row['Task'];?></td>

         <?php if($_SESSION['role']==1 ){ ?>
            <?php $log =$row['login_Id']?>
            <?php $data=mysqli_query($con,"SELECT * FROM login WHERE Id=$log ");?>
            <?php $A = mysqli_fetch_assoc($data);?>
            <?php $B = $A['Username']; ?>
            
            <td><a href="info.php?ui=<?php echo $A['Id']?>"><button><?php echo $B ;?></button></a></td>
        <?php } ?>
        <td><a class="btn btn-info" href="update.php?update=<?php echo $row['id'];?>"><button style="color:blue">Update</button></a></td>
        <td><a class="btn btn-danger" href="delete.php?delete=<?php echo $row['id'];?>"><button style="color:red">Delete</button></a></td>
       
       
        
            <?php } ?>
        </tr> 
       <?php }
    }   else{
          $no = "No data here!";
        } ?>

 

</table>
 <h4 style="color:red"><?php echo $no;?></h4>

 
</body>
</html>





