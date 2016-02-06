<?php
error_reporting(E_ALL);
session_start();
$vlera= $_SESSION['loginconfirm'];

require("mysqlconnect.php");

if(isset($_POST['comment']))
{
	$img_id=$_POST['img_idvalue'];
	$comment=$_POST['comment'];
	

	$sql= " INSERT INTO comments(img_id,text,user_id) VALUES('$img_id','$comment','$vlera')";
	$query= mysqli_query($conn,$sql);

	if($query){
		echo "Success";
	}else{
		die($query);
	}
}
header('Location:faqa1.php');
?>