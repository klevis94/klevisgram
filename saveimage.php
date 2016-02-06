<?php
require("mysqlconnect.php");
error_reporting(E_ALL);
//specifikon direktorine ku foto do te vendoset pas perzgjedhjes
$target_dir="uploads/";
//specifikon rrugen e plote te fotos pasi perzgjidhet per ne direktori
$target_file=$target_dir.basename($_FILES["fileToUpload"]["name"]); //1-emri i vendosur ne <input name="fileToUpload"
echo "$target_file";
//2-emri i fotos te zgjedhur
$uploadOk=1;
//Check if image file is a actual image of fake image
$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);

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
//check if file already exist
if(file_exists($target_file)){
	echo "Sorry,file already exist. ";
	$uploadOk=0;

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

	if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file ))
	{ 

		$query=mysqli_query($conn,"INSERT INTO images_tbl(images_path) VALUES ('".$target_file."')");


	}else{
		
		echo "Error while uploading image on the server";
	}
}
?>