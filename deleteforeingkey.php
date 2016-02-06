

<?php
$hostname="localhost";
$username="root";
$password="";
$dbname="klevisgram";

$conn= mysqli_connect($hostname,$username,$password,$dbname);
if(!$conn){
	die("Could not connect to databse".myslqi_connect_error());
}

ALTER TABLE `images_tbl`(
ADD CONSTRAINT `img_id_ibfk_1`
FOREIGN KEY (`img_id`) REFERENCES `images_tbl` (`images_id`)
ON DELETE CASCADE);
?>
