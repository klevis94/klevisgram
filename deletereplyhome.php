<?php
error_reporting(E_ALL);

require("mysqlconnect.php");
if(isset($_GET['deletebutton'])){


	$id=$_GET['deletereply'];

	$sql = "DELETE FROM replies WHERE id=$id";

	$query= mysqli_query($conn,$sql);
	header('Location:faqa1.php');

}

?>