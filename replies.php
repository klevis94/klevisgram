<?php
error_reporting(E_ALL);
session_start();
$vlera= $_SESSION['loginconfirm'];

require("mysqlconnect.php");
if(isset($_POST['reply'])){


	$comment_id=$_POST['comment_id'];
	$reply=$_POST['replytext'];

	$sql= "INSERT INTO replies(comment_id,reply_text,user_id) VALUES ('$comment_id','$reply','$vlera')";
	$query= mysqli_query($conn,$sql);
	header('Location:faqa1.php');
}