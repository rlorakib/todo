<?php

/*
class Data{
    public $hostname;
    public $username;
    public $password;
    public $db;
    public $con;

    public function __construct($hostname,$username,$password,$db){
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->db = $db;

        $this->con = mysqli_connect($this->hostname,$this->username,$this->password,$this->db);

        if(!$this->con){
            echo mysqli_error($this->con);
        }
    }
}
$Data = new Data('localhost','root','','first_db');
*/
$con = mysqli_connect('localhost','root','','first_db');

if(!$con){
    die ("connection failed :" .mysqli_error($con));
}
?>