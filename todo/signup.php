<?php
include "database.php";

$err='';

if(isset($_POST['submit'])){
    if(empty($_POST['uname'])){
        $err = "Incorrect username";
    }else{
       $uname=input($_POST['uname']); 
       if(preg_match("/^[a-zA-Z-']*$/",$uname)){
        $username=$uname;
       }else{
        $err = "Invalid username.";
       }
    }
    if(empty($_POST['pnumber'])){
        $err = "minimum 11 digit and limit 11 digit";
    }else{
       $pnumber=input($_POST['pnumber']); 
       if(filter_var($pnumber,FILTER_VALIDATE_INT)==11){
        $phonenumber=$pnumber;
       }else{
        $err = "Invalid phone number";
       }
    }
    if(empty($_POST['email'])){
        $err = "Required Email";
    }else{
       $email=input($_POST['email']); 
       if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        $emailname=$email;
       }else{
        $err="Invalid email";
       }
    }
    if(empty($_POST['password'])){
        $err = "Required password";
    }else{
       $pass=input($_POST['password']); 
       if($pass >= 6){
        $password=$pass;
       }else{
        $err = "Invalid password";
       }
    }
   
}

function input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>
<style>
    .signup{
        margin: auto;
  width: 15%;
  border: 3px solid #73AD21;
  padding: 10px;
    }
</style>
<body>
    <h1 style="text-align:center;color:blue">Sign up</h1>
    <div class="signup">
    <form action="" method="post">
        <label for="uname"><b>Username:</b></label><br>
        <input type="text" placeholder="username" name="uname" id="uname">
        <label for="pname"><b>Phone number:</b></label><br>
        <input type="text" placeholder="username" name="pnumber" id="pname">
        <label for="user"><b>Email:</b></label><br>
        <input type="text" name="email" id="user" name="email" placeholder="Enter email"><br>
        
        <label for="pass"><b>Password:</b></label><br>
        <input type="text" name="password" id="pass" placeholder="Enter password"><br>
        
        <input type="submit" value="signup" name="submit">
        <span style="color:red"><?php echo $err;?></span>
    </form>
</div><p style="text-align:center"><a href="login.php?"><button style="color:blue">Back</button></a></p>
</body>
</html>