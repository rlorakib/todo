<?php
include "database.php";


$err='';

if(isset($_POST['submit'])){   
  
    if(empty($_POST['uname'])){
        $err = "Required username";
    }else{
       $uname=input($_POST['uname']); 
       if(preg_match("/^[A-Z]/",$uname)){
        $username=$uname;
        if(empty($_POST['pnumber'])){
            $err = "Required phone number";
        }else{
           $pnumber=input($_POST['pnumber']); 
           if(filter_var($pnumber,FILTER_VALIDATE_INT)<=11){
            $phonenumber=$pnumber;
            if(empty($_POST['email'])){
                $err = "Required Email";
            }else{
               $email=input($_POST['email']); 
               if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $emailname=$email;
                   if(empty($_POST['password'])){
                      $err = "Required password";
                   }else{
                      $pass=input($_POST['password']);
                      $str = strlen("$pass"); 
                      if($str==6){
                         $password=$pass;
                         $data = "INSERT INTO login(Username,Phone,Email,Password,Rol) values('$uname','$pnumber','$email','$pass',0)";
                         mysqli_query($con,$data);
                         
                         header("location:login.php");
                       }else{
                          $err = "Invalid password";
                        }
                }
              }else{
                 $err="Invalid email";
                }
            }
           }else{
            $err = "Invalid phone number";
           }
        }
       }else{
        $err = "Invalid username.";
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
    body{
    background-color: #66ffe0;
} 
</style>
<body>
    <h1 style="text-align:center;color:blue">Sign up</h1>
    <div class="signup">
    <form action="" method="post">
        <label for="uname"><b>Username:</b></label><br>
        <input type="text" title="Username first character(A-Z)" placeholder="username" name="uname" maxlength="50">
        <label for="pnumber"><b>Phone number:</b></label><br>
        <input type="text" maxlength="11" title="set number 11 digit." placeholder="Phone number" name="pnumber">
        <label for="email"><b>Email:</b></label><br>
        <input type="text" title="Email field" name="email" placeholder="Enter email"><br>
        
        <label for="password"><b>Password:</b></label><br>
        <input type="text" title="password must be 6 digit int" name="password" placeholder="Enter password" maxlength="6"><br>
        
        <input type="submit" value="signup" name="submit">
        <span style="color:red"><?php echo $err;?></span>
    </form>
</div><p style="text-align:center"><a href="login.php?"><button style="color:blue">Back</button></a></p>
</body>
</html>