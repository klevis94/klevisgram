<?php
require("mysqlconnect.php"); 

error_reporting(E_ALL);
session_start();
$tmp_id=$_SESSION['loginconfirm'];
if(isset($_POST['change'])){

    $old=$_POST['username'];
	$new=$_POST['newusername'];


}
$sql="SELECT * FROM users WHERE id=$tmp_id";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
	$row=mysqli_fetch_assoc($result);
}
if($row['name']!=$old){
	echo "Your old username "."<u>".$old."</u>"." is not correct ! Please "."<a href='username.php'>"."go back"." </a>"."and enter a valid one!";
}else{

$sqlUpdate = "UPDATE users SET name='$new' WHERE id='$tmp_id'";

if (mysqli_query($conn, $sqlUpdate)) {
    echo "Record updated successfully"."<a href='settings.php'>"."go back"." </a>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
}
?>