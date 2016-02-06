<?php
require("mysqlconnect.php"); 

error_reporting(E_ALL);
session_start();
if(!isset($_SESSION['loginconfirm'])) 

 header('Location:index.php');else

$tmp_id=$_SESSION['loginconfirm'];

$sql="DELETE  FROM users WHERE id=$tmp_id";
if(mysqli_query($conn,$sql)){
	

header('Refresh:3; index.php');
echo 'Your account is deactivated!';
}

?>