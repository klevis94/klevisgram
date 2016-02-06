<!DOCTYPE HTML>
<html>
<body style="background-color:Aquamarine ">
<?php
require("mysqlconnect.php"); 
session_start();
if(!isset($_SESSION['loginconfirm'])) 

 header('Location:index.php');else

$session=$_SESSION['loginconfirm'];
$url=$_GET['id'];

$_SESSION['pass']=$url;


?>





<?php
$sqlU="SELECT * FROM users WHERE id=$session";
$resultU=mysqli_query($conn,$sqlU);
if(mysqli_num_rows($resultU)>0){
	$rowU=mysqli_fetch_assoc($resultU);
}
?>
<div style="color:black; text-align:left;background-color:#717171;font-size:100%">
<h2 > <?php echo "Welcome ".$rowU['name']; ?>  </h2>
<h3 >This is a prewiew of my profile!</h3>
<a href="faqa1.php">Exit</a>
</div>





<?php
$sqlU2="SELECT * FROM users WHERE id=$url";
$resultU2=mysqli_query($conn,$sqlU2);
if(mysqli_num_rows($resultU2)>0){
	$rowU2=mysqli_fetch_assoc($resultU2);
}
?>

<?php

$sql="SELECT * FROM images_tbl WHERE user_id=$url";
	$result=mysqli_query($conn,$sql);

	if(mysqli_num_rows($result)>0)
	{
		while ($row=mysqli_fetch_assoc($result)) {
			$id=$row["images_id"];
			?>

			 <h2 style=color:crimson><?php echo $rowU2['name']."<br>";?> </h2>
			 <img src="<?php  echo  $row["images_path"];  ?>" width="30%" height="auto"  > <br>

			 <?php if($rowU['type']=="admin"){ ?>
			 <form method="GET" action="admindeletephoto.php">
	<input type="hidden" name="delete" value= "<?php echo $row['images_id']; ?>">
	<input type="submit" name="deleteb" value="delete"><br>
	</form>
<?php }  ?>


			<?php
$sql2="SELECT * FROM comments";
	$result2=mysqli_query($conn,$sql2);
	if(mysqli_num_rows($result2)>0){

      while($row2=mysqli_fetch_assoc($result2))
      {

       
       if($row2['img_id']==$row['images_id'])
       {
           $idu=$row2['user_id'];


$sqlU3="SELECT * FROM users WHERE id=$idu";
$resultU3=mysqli_query($conn,$sqlU3);
if(mysqli_num_rows($resultU3)>0){
	$rowU3=mysqli_fetch_assoc($resultU3);
}
       	 
       	 ?>
       	
       	  <h4 style=color:blue>=><u><?php echo $rowU3['name']."</u>"." "."<small>"."commented: "."</small>"."<i style=color:black>".$row2['text']."</i>"."<br>"; ?> </h4>
          
          <?php if($rowU['type']=="admin"){ ?>
       		<form method="GET" action="admindeletecomment.php">
	<input type="hidden" name="deletecomment" value= "<?php echo $row2['id']; ?>">
	<input type="submit" name="deletebutton" value="delete"><br>
	</form>
	<?php  } ?>

<?php
$sql3="SELECT * FROM replies";
	$result3=mysqli_query($conn,$sql3);
	if(mysqli_num_rows($result3)>0){

      while($row3=mysqli_fetch_assoc($result3))
      {
       
       if($row3['comment_id']==$row2['id'])
       {
       	
       	$idUr=$row3['user_id'];


$sqlU="SELECT * FROM users WHERE id=$idUr";
$resultU=mysqli_query($conn,$sqlU);
if(mysqli_num_rows($resultU)>0){
	$rowU4=mysqli_fetch_assoc($resultU);
}
       	 ?>
       	 <ul>
       	<li>
       		<h4 style=color:blue><u><?php echo $rowU4['name']."</u>"." "."<small>"."replied: "."</small>"."<i style=color:black>".$row3['reply_text']."</i>"."<br>" ;?> </h4>
         </li>
     </ul>
      <?php if($rowU['type']=="admin"){ ?>
       	 <form method="GET" action="admindeletereply.php">
	<input type="hidden" name="deletereply" value= "<?php echo $row3['id']; ?>">
	<input type="submit" name="deletebutton" value="delete"><br>
	</form>
<?php }  ?>









<?php 
}}}
}}
}}}
?>






</body>
</html>