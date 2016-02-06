<?php
error_reporting(E_ALL);
session_start();
require("mysqlconnect.php");
if(isset($_GET['deletebutton'])){


	$id=$_GET['deletecomment'];

	$sql = "DELETE FROM comments WHERE id=$id";

	$query= mysqli_query($conn,$sql);
	header('Location:profileprv.php?id='.$_SESSION['pass']);
}

?>