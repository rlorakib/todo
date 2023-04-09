<?php
include "database.php";
session_start();
$emailer='';


class login{
    public function login($con,$useremail,$userpass){
        $this->con = $con;
        
        $select = "SELECT * FROM login WHERE Email='$useremail' AND Password='$userpass'";
        $query = mysqli_query($this->con,$select);
        $count = mysqli_num_rows($query);
        if($count>0){
            $a = mysqli_fetch_assoc($query);
            $_SESSION['uname'] = $a['Username'];
            $_SESSION['role'] = $a['Rol'];
            $_SESSION['id'] = $a['Id'];
            header("location:form.php");
        }else{
            $emailer = "Sorry, Don't match";
        }

    }
}
$login = new login();
if(isset($_POST['submit'])){
    if(!empty($_POST['email'] && $_POST['password'])){
      $login->login($con,$_POST['email'],$_POST['password']);
}else{
    $emailer= "Required fields";
}}
/*
if(isset($_POST['submit'])){
     if(empty($_POST['email'])){
        $emailer="required email!";
     }else{
        if(empty($_POST['password'])){
            $emailer = "required password!";
        }else{
            $useremail = $_POST['email'];
            $userpass = $_POST['password'];
            $select = "SELECT * FROM login WHERE Email='$useremail' AND Password='$userpass'";
            $result = mysqli_query($con, $select);
            $count = mysqli_num_rows($result);
            if($count>0){
               $a = mysqli_fetch_assoc($result);
               $_SESSION['uname'] = $a['Username'];
               $_SESSION['role'] = $a['Rol'];
               $_SESSION['id'] = $a['Id'];
               if($_SESSION['role'] == 1){
                  header("location:form.php");
                }
               if($_SESSION['role'] == 0){
                   header("location:form.php");
                }
            
            }else{
               $emailer = "Sorry,Don't match!";
             }
           
        }
        

   
       
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
    <title>Login</title>
</head>
<style>
 .center {
  margin: auto;
  width: 15%;
  border: 3px solid #73AD21;
  padding: 10px;
}  
body{
    background-color: #66ffe0;
} 
</style>

<body>

<p style="text-align:right">Not a member? <a href="signup.php?"><button style="color:red">Sign up</button></a></p>    
<br><br><br><br>

    <div class="center"><h2 style="text-align:center;color:blue">Login</h2>
    <p>Already have an account.</p>
    <form action="" method="post">
        <label for="user"><b>Email:</b></label><br>
        <border><input type="text" name="email" id="user" placeholder="Enter email"><br>
        </border>
        <label for="pass"><b>Password:</b></label><br>
        <input type="text" name="password" id="pass" placeholder="Enter password"><br>
        <input type="submit" value="Login" name="submit">
        <span style="color:red"><?php echo $emailer;?></span>
    </form>
   </div>


</body>
</html>

