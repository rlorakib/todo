<?php
include "database.php";

$emailer='';

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(empty($_POST['email']) || ($_POST['password'])){
        $emailer="Sorry, required fields!";
    }else{
        $email = $_POST['email'];
        $pass = $_POST['password'];
        if(filter_var($email, FILTER_VALIDATE_EMAIL) && (preg_match("/^[a-zA-Z-' 0-9]*$/",$pass))){
            $in = "INSERT INTO login(Password,Email) values('$pass','$email')";
            mysqli_query($con, $in);
            header("location:form.php");

        }else{
            $emailer="Sorry, please try again.";
        }
    }
}

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
</style>

<body>
<p style="text-align:right">Not a member? <a href="signup.php?signup=<?php echo 'signup'?>"><button>Sign up now</button></a></ps>    
<br><br><br><br>

    <div class="center"><h2 style="text-align:center;color:blue">Login</h2>
    <p>Already have an account.</p>
    <form action="" method="post">
        <label for="user"><b>Email:</b></label><br>
        <border><input type="text" name="email" id="user" placeholder="Enter email"><br>
        </border>
        <label for="pass"><b>Password:</b></label><br>
        <input type="text" name="password" id="pass" placeholder="Enter password"><br>
        
        <input type="submit" value="Login">
    </form>
   </div>
<h4 style="color:red"><?php echo $emailer; ?></h4>

</body>
</html>

