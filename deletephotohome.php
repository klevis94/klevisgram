<?php
error_reporting(E_ALL);

require("mysqlconnect.php");
if(isset($_GET['deleteb'])){


	$id=$_GET['delete'];

	$sql = "DELETE FROM images_tbl WHERE images_id=$id";

	$query= mysqli_query($conn,$sql);
	header('Location:faqa1.php');

}

?>