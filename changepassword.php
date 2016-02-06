<?php
require("mysqlconnect.php"); 

error_reporting(E_ALL);
session_start();
if(!isset($_SESSION['loginconfirm'])) 

 header('Location:index.php');else
$tmp_id=$_SESSION['loginconfirm'];
if(isset($_POST['change'])){

    $old=$_POST['password'];
    $oldmd5=md5($old);
	$new=$_POST['newpassword'];
	 $newR=$_POST['repeat'];
	$newmd5=md5($new);
    


}
if($new!=$newR){
	header('Location:password.php');

}else
$sql="SELECT * FROM users WHERE id=$tmp_id";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
	$row=mysqli_fetch_assoc($result);
}
if($row['password']!=$oldmd5){
	echo "Your old password "."<u>".$old."</u>"." is not correct ! Please "."<a href='password.php'>"."go back"." </a>"."and enter a valid one!";
}else{

$sqlUpdate = "UPDATE users SET password='$newmd5' WHERE id='$tmp_id'";

if (mysqli_query($conn, $sqlUpdate)) {
    echo "Record updated successfully"."<a href='settings.php'>"."go back"." </a>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
}
?>