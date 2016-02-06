<?php
error_reporting(E_ALL);

require("mysqlconnect.php");
if(isset($_GET['deletebutton'])){


	$id=$_GET['deletecomment'];

	$sql = "DELETE FROM comments WHERE id=$id";

	$query= mysqli_query($conn,$sql);
	header('Location:faqa1.php');

}

?>