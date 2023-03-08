<?php
$hostname = 'localhost';
$user = 'root';
$password = '';
$db = 'first_db';

$con = mysqli_connect($hostname,$user,$password,$db);

if(!$con){
    echo "Connection failed ". mysqli_connect_error($con) or die("Sorry");
}

?>