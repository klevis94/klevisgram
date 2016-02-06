<?php
require("mysqlconnect.php"); ?>
<?php
session_start();
if(!isset($_SESSION['loginconfirm'])) 

 header('Location:index.php');else 
$tmp_id=$_SESSION['loginconfirm'];



$sqlU="SELECT * FROM users WHERE id=$tmp_id";
$resultU=mysqli_query($conn,$sqlU);
if(mysqli_num_rows($resultU)>0){
	$rowK=mysqli_fetch_assoc($resultU);
}

?>

<!DOCTYPE html>


<html>


<body style="background-color:Aquamarine ">
	<a href="logout.php">Logout</a> <br>
	<form action="profile.php" method="POST" align="right">
	 <input type="submit" name="submit" value="Profile">
	 </form>


	 <?php
$sqlU="SELECT * FROM users WHERE id=$tmp_id";
$resultU=mysqli_query($conn,$sqlU);
if(mysqli_num_rows($resultU)>0){
	$rowU=mysqli_fetch_assoc($resultU);
}
echo "Welcome ".$rowU['name'];


?>


<h1 style="color:black; text-align:center;background-color:pink;font-size:300%">
	Klevis's gram like famous instagram  </h1>  

	<form action="php1.php" method="post" enctype="multipart/form-data">
		<input type="file" name="fileToUpload" id="fileToUpload"><br><br>
		<input type="submit" name="submit" value="Upload image">
	</form>
	<br>

	<?php

	$sql="SELECT * FROM images_tbl";
	$result=mysqli_query($conn,$sql);

	if(mysqli_num_rows($result)>0)
	{
		while ($row=mysqli_fetch_assoc($result)) {
	
	    $id=$row['user_id'];


	    $sqlU="SELECT * FROM users WHERE id=$id";
$resultU=mysqli_query($conn,$sqlU);
if(mysqli_num_rows($resultU)>0){
	$rowU=mysqli_fetch_assoc($resultU);
}  

$idprv=$rowU['id'];
 

   

			?>

		 <a href="profileprv.php?id=<?php echo $idprv; ?>" style=color:crimson> <?php echo $rowU['name']."<br>";?> </a>

		
     <img src="<?php  echo  $row["images_path"];  ?> " width="30%" height="auto" >

     <?php



     if($_SESSION['loginconfirm']==$row['user_id']||$rowK['type']=="admin"){
     

     ?>

     <form method="GET" action="deletephotohome.php">
	<input type="hidden" name="delete" value= "<?php echo $row['images_id']; ?>">
	<input type="submit" name="deleteb" value="delete"><br>
	</form> 


<?php } ?>


 </br>


		<?php

	$sql2="SELECT * FROM comments";
	$result2=mysqli_query($conn,$sql2);
	if(mysqli_num_rows($result2)>0){

      while($row2=mysqli_fetch_assoc($result2))
      {
       
       if($row2['img_id']==$row['images_id'])
       {
       	
       	 $id=$row2['user_id'];


       	   $sqlU="SELECT * FROM users WHERE id=$id";
$resultU=mysqli_query($conn,$sqlU);
if(mysqli_num_rows($resultU)>0){
	$rowU=mysqli_fetch_assoc($resultU);
} 
$idprv=$rowU['id'];


?>
 <a href="profileprv.php?id=<?php echo $idprv; ?>" style=color:crimson> <?php echo $rowU['name']."<br>";?> </a>

<?php

       	  echo "COMMENT: ".$row2['text'];


     	   

     if($_SESSION['loginconfirm']==$row2['user_id'] ||$_SESSION['loginconfirm']==$row['user_id']||$rowK['type']=="admin")
     {
     
       	?> 

       		<form method="GET" action="deletecommenthome.php">
	<input type="hidden" name="deletecomment" value= "<?php echo $row2['id']; ?>">
	<input type="submit" name="deletebutton" value="delete"><br>
	</form>

   <?php   }   ?>    		
       	
	<form method="POST" action="replies.php">
	<input type="text" name="replytext" placeholder="reply here..." class="reply">
	<input type="hidden" name="comment_id" value= "<?php echo $row2['id']; ?>">
	<input type="submit" name="reply" value="reply"><br>
	</form>

	<?php
	$sql3="SELECT * FROM replies";
	$result3=mysqli_query($conn,$sql3);
	if(mysqli_num_rows($result3)>0){

      while($row3=mysqli_fetch_assoc($result3))
      {
       
       if($row3['comment_id']==$row2['id'])
       {

       	$id=$row3['user_id'];

       	    $sqlU="SELECT * FROM users WHERE id=$id";
$resultU=mysqli_query($conn,$sqlU);
if(mysqli_num_rows($resultU)>0){
	$rowU=mysqli_fetch_assoc($resultU);

} 	   
$idprv=$rowU['id'];

?>

<a href="profileprv.php?id=<?php echo $idprv; ?>" style=color:crimson> <?php echo $rowU['name']."<br>";?> </a>

<?php


       	 echo "REPLY: ".$row3['reply_text']."<br>"; 



     if($_SESSION['loginconfirm']==$row3['user_id'] ||$_SESSION['loginconfirm']==$row['user_id']||$rowK['type']=="admin")
     {

       	?>

       	 <form method="GET" action="deletereplyhome.php">
	<input type="hidden" name="deletereply" value= "<?php echo $row3['id']; ?>">
	<input type="submit" name="deletebutton" value="delete"><br>
	</form>

<?php } ?>


<?php
       }


      }

}
}

}} ?>
<form method="POST" action="comment.php">
		 		<input type="text" name="comment" placeholder="comment here">
		        <input type="hidden" name="img_idvalue" value="<?php echo $row['images_id']; ?>">
		        <input type="submit" name= "submit" value="send"> <br>
      		</form>
<?php
}

	}


?>


	
</body>
</html>
