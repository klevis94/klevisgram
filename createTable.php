<?php
$hostname="localhost";
$username="root";
$password="";
$dbname="KlevisGram";

$conn=mysqli_connect($hostname,$username,$password,$dbname);
if(!$conn)
{
	die("Could not connect to database ".mysqli_connect_error());
}

//create table
$sqltable="CREATE TABLE images_tbl(
           images_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
           images_path VARCHAR(200) NOT NULL,
           submission_date TIMESTAMP


	)";
if(mysqli_query($conn,$sqltable))
{
	echo "Table with name : images_tbl created successfully ";
}else{
	echo "Table could not be created : ".mysqli_error($conn);
}
mysqli_close($conn);
?>