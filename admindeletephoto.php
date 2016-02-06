<?php
error_reporting(E_ALL);
session_start();

require("mysqlconnect.php");
if(isset($_GET['deleteb'])){


	$id=$_GET['delete'];

	$sql = "DELETE FROM images_tbl WHERE images_id=$id";

	$query= mysqli_query($conn,$sql);
	header('Location:profileprv.php?id='.$_SESSION['pass']);
}

?>