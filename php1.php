<?php
session_start();

?>
<?php
$tmp_id = $_SESSION['loginconfirm'];
require("mysqlconnect.php");
//specifikon direktorine ku foto do te vendoset pas perzgjedhjes
$target_dir="uploads/";
$fullname=$target_dir.basename($_FILES["fileToUpload"]["name"]);
$filename=$target_dir.pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_FILENAME);
//2-emri i fotos te zgjedhur
$uploadOk=1;
//Check if image file is a actual image of fake image
$imageFileType=pathinfo($fullname,PATHINFO_EXTENSION);

if(isset($_POST["submit"])){
$check =getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if($check!==false){
	echo "File is an image ".$check["mime"]."."."<br>"; //mime merr formen e filet te update dmth merr .txt.jpg ose dicka tj
	$uploadOk=1;
}else{

	echo "File is not an image.";
	$uploadOk=0;
}

}
//check if file already exist and if exist change the name to store it again

//random algorithem

//end of random algorithem

while(file_exists($fullname)){
$fullname=$filename.uniqid().".".$imageFileType;	

}

//check file size
if($_FILES["fileToUpload"]["size"]>5000000){
	echo"Sorry,this file is too large.";
	$uploadOk=0;

}
//Allow certain file formats
if($imageFileType!="jpg"&&$imageFileType!="png"&&$imageFileType!="jpeg"&&$imageFileType!="gif")
{
echo "Sorry,only JPG,JPEG,PNG & GIF files are allowed.";
$uploadOk=0;

}
//Check if $upload
if($uploadOk==0){
	echo "Sorry,your file was not uploaded. ";

}else{

	if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fullname))
	{
	
	$query=mysqli_query($conn,"INSERT INTO images_tbl(images_path,user_id) VALUES ('$fullname','$tmp_id')");


	}else{
		
		echo "Error while uploading image on the server";
	}
}
header('Location:faqa1.php');
?>