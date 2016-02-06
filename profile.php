<?php
require("mysqlconnect.php"); 


session_start();
if(!isset($_SESSION['loginconfirm'])) 

 header('Location:index.php');else

$tmp_id= $_SESSION['loginconfirm'];


$sqlA="SELECT * FROM users WHERE id=$tmp_id";
$resultA=mysqli_query($conn,$sqlA);
if(mysqli_num_rows($resultA)>0){
	$rowA=mysqli_fetch_assoc($resultA);
}
if($rowA['type']=="admin"){
	header('Location:dashboard.php');
}else






?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body style="background-color:Aquamarine ">

	<form action="faqa1.php" method="POST" align="right">
	 <input type="submit" name="submit" value="Home">
	 </form>


<?php
$sqlU="SELECT * FROM users WHERE id=$tmp_id";
$resultU=mysqli_query($conn,$sqlU);
if(mysqli_num_rows($resultU)>0){
	$rowU=mysqli_fetch_assoc($resultU);
}
echo $rowU['name']." ";

?>
<a href="settings.php" style="font-size:28px; "><i class="fa fa-cog fa-spin"></i></a> 
<h2 style="color:black; text-align:center;background-color:pink;font-size:300%">Klevis's gram profile</h2>
<?php









	$sql="SELECT * FROM images_tbl WHERE user_id=$tmp_id";
	$result=mysqli_query($conn,$sql);

	if(mysqli_num_rows($result)>0)
	{
		while ($row=mysqli_fetch_assoc($result)) {
			$id=$row["images_id"];
			?>


	   <h2 style=color:crimson><?php echo $rowU['name']."<br>";?> </h2>
<?php

			?>
			<img src="<?php  echo  $row["images_path"];  ?>" width="30%" height="auto"  ><br>
			
			<form method="GET" action="deletephoto.php">
	<input type="hidden" name="delete" value= "<?php echo $row['images_id']; ?>">
	<input type="submit" name="deleteb" value="delete"><br>
	</form>


			<?php
$sql2="SELECT * FROM comments";
	$result2=mysqli_query($conn,$sql2);
	if(mysqli_num_rows($result2)>0){

      while($row2=mysqli_fetch_assoc($result2))
      {

       
       if($row2['img_id']==$row['images_id'])
       {
       	 $idu=$row2['user_id'];


       	 
$sqlU="SELECT * FROM users WHERE id=$idu";
$resultU=mysqli_query($conn,$sqlU);
if(mysqli_num_rows($resultU)>0){
	$rowU=mysqli_fetch_assoc($resultU);
}
       	 
       	 ?>
       	 <h3 style=color:blue><?php echo $rowU['name']; ?> </h3>
<?php


        
       	 echo "COMMENT: ".$row2['text']."<br>"; 
       
       	?> 

       	<form method="GET" action="deletecomment.php">
	<input type="hidden" name="deletecomment" value= "<?php echo $row2['id']; ?>">
	<input type="submit" name="deletebutton" value="delete"><br>
	</form>
	<form method="POST" action="replies_profile.php">
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
       	
       	$idUr=$row3['user_id'];


$sqlU="SELECT * FROM users WHERE id=$idUr";
$resultU=mysqli_query($conn,$sqlU);
if(mysqli_num_rows($resultU)>0){
	$rowU=mysqli_fetch_assoc($resultU);
}
       	 ?>
       	 
       	<h3 style=color:blue><?php echo $rowU['name'] ;?> </h3>
       	<?php





       	 echo "REPLY: ".$row3['reply_text']."<br>"; 
         ?>
         <form method="GET" action="deletereply.php">
	<input type="hidden" name="deletereply" value= "<?php echo $row3['id']; ?>">
	<input type="submit" name="deletebutton" value="delete"><br>
	</form>
<?php
       	}
       }
   }
}
}
       	?>

			<?php

		}
		?>


<form method="POST" action="comment_profile.php">
		 		<input type="text" name="comment" placeholder="comment here">
		        <input type="hidden" name="img_idvalue" value="<?php echo $row['images_id']; ?>">
		        <input type="submit" name= "submit" value="send"> <br>
      		</form>

<?php

	}
	}else
	echo "There is nothing to show! Please upload something first!";



		?>	
			
</body>
</html>

