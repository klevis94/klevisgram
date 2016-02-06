<html>
<?php

require("mysqlconnect.php"); 


session_start();
if(!isset($_SESSION['loginconfirm'])) 

 header('Location:index.php');else
?>
<h2><u> General information:</u></h2>
<?php

//Count how many users are

$query = "SELECT COUNT(*) FROM users WHERE type!='admin'";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0)
	{
    while($row = mysqli_fetch_array($result)){ 
    echo "Total number of users  : ". $row['COUNT(*)']."<br>";
}}

//Counts how many users are with gender male

$query = "SELECT COUNT(*) FROM users WHERE gender='male'";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0)
	{
    while($row = mysqli_fetch_array($result)){
    echo "The number of users where gender is male : ". $row['COUNT(*)']."<br>";
}}


//Counts how many users are with gender female

$query = "SELECT COUNT(*) FROM users WHERE gender='female'";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0)
	{
    while($row = mysqli_fetch_array($result)){
    echo "The number of users where gender is female : ". $row['COUNT(*)']."<br>";

}}

//Counts how many uploaded images are 

$query = "SELECT COUNT(*) FROM images_tbl ";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0)
	{
    while($row = mysqli_fetch_array($result)){
    echo "Total number of uploaded image  : ". $row['COUNT(*)']."<br>";
}}

//Counts how many comments are 

$query = "SELECT COUNT(*) FROM comments ";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0)
	{
    while($row = mysqli_fetch_array($result)){
    echo "Total number of comments : ". $row['COUNT(*)']."<br>";
}}

//Counts how many replies are 

$query = "SELECT COUNT(*) FROM replies ";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0)
	{
    while($row = mysqli_fetch_array($result)){
    echo "Total number of replies : ". $row['COUNT(*)']."<br>";
}}
//provaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa

$date=date("Y-m-d H:i:s",strtotime("-1 month"));


//users
$queryU = "SELECT COUNT(*) FROM users WHERE date>'$date'&& type!='admin' ";
$resultU=mysqli_query($conn,$queryU);
if(mysqli_num_rows($resultU)>0)
	{
    while($rowU = mysqli_fetch_array($resultU)){ 
echo "Total number of users registered this month : ". $rowU['COUNT(*)']."<br>";
}}


//photos
$queryP = "SELECT COUNT(*) FROM images_tbl WHERE date>'$date' ";
$resultP=mysqli_query($conn,$queryP);
if(mysqli_num_rows($resultP)>0)
	{
    while($rowP = mysqli_fetch_array($resultP)){ 
echo "Total number of photos uploaded this month : ". $rowP['COUNT(*)']."<br>";
}}

//comments
$queryC = "SELECT COUNT(*) FROM comments WHERE date>'$date' ";
$resultC=mysqli_query($conn,$queryC);
if(mysqli_num_rows($resultC)>0)
	{
    while($rowC = mysqli_fetch_array($resultC)){ 
echo "Total number of comments  this month : ". $rowC['COUNT(*)']."<br>";
}}

//replies
$queryR = "SELECT COUNT(*) FROM replies WHERE date>'$date' ";
$resultR=mysqli_query($conn,$queryR);
if(mysqli_num_rows($resultR)>0)
	{
    while($rowR = mysqli_fetch_array($resultR)){ 
echo "Total number of replies this month : ". $rowR['COUNT(*)']."<br>";
}}







//users
$queryU = "SELECT COUNT(*) FROM users WHERE date<'$date'&& type!='admin' ";
$resultU=mysqli_query($conn,$queryU);
if(mysqli_num_rows($resultU)>0)
	{
    while($rowU = mysqli_fetch_array($resultU)){ 
echo "Total number of users registered last month : ". $rowU['COUNT(*)']."<br>";
}}


//photos
$queryP = "SELECT COUNT(*) FROM images_tbl WHERE date<'$date' ";
$resultP=mysqli_query($conn,$queryP);
if(mysqli_num_rows($resultP)>0)
	{
    while($rowP = mysqli_fetch_array($resultP)){ 
echo "Total number of photos uploaded last month : ". $rowP['COUNT(*)']."<br>";
}}

//comments
$queryC = "SELECT COUNT(*) FROM comments WHERE date<'$date' ";
$resultC=mysqli_query($conn,$queryC);
if(mysqli_num_rows($resultC)>0)
	{
    while($rowC = mysqli_fetch_array($resultC)){ 
echo "Total number of comments  last month : ". $rowC['COUNT(*)']."<br>";
}}

//replies
$queryR = "SELECT COUNT(*) FROM replies WHERE date<'$date' ";
$resultR=mysqli_query($conn,$queryR);
if(mysqli_num_rows($resultR)>0)
	{
    while($rowR = mysqli_fetch_array($resultR)){ 
echo "Total number of replies last month : ". $rowR['COUNT(*)']."<br>";
}}










//provaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
?>
<h2><u>Detailed information for each user : </u></h2>

<ol>
<?php

$query = "SELECT * FROM users WHERE type!='admin' ";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0)
	{
    while($row = mysqli_fetch_array($result)){ 


    	$name=$row['name'];
    	$id=$row['id'];
    	
$query1 = "SELECT COUNT(*) FROM comments WHERE user_id=$id ";
$result1=mysqli_query($conn,$query1);
if(mysqli_num_rows($result1)>0)
	{
    while($row1 = mysqli_fetch_array($result1)){
    $pic= $row1['COUNT(*)'];
}}



$query2 = "SELECT COUNT(*) FROM comments WHERE user_id=$id ";
$result2=mysqli_query($conn,$query2);
if(mysqli_num_rows($result2)>0)
	{
    while($row2 = mysqli_fetch_array($result2)){
    $comments= $row2['COUNT(*)'];
}}

$query3 = "SELECT COUNT(*) FROM replies WHERE user_id=$id ";
$result3=mysqli_query($conn,$query3);
if(mysqli_num_rows($result3)>0)
	{
    while($row3 = mysqli_fetch_array($result3)){
    $replies= $row3['COUNT(*)'];
}}










?>

 <li> <?php echo $row['name']." =>"."<i>Uploaded photos : </i>"." ".$pic." "."<i>Comments : </i>"." ".$comments." "."<i>Replies </i>: "." ".$replies."<br>" ;?> </li>
  <?php

}}
?>
<h2><u>Users registered this month:</u></h2>
<ol>
<?php

$queryU = "SELECT * FROM users WHERE date>'$date'&& type!='admin' ";
$resultU=mysqli_query($conn,$queryU);
if(mysqli_num_rows($resultU)>0)
	{
    while($rowU = mysqli_fetch_array($resultU)){ ?>

<li><?php echo $rowU['name']."<br>";?></li><?php

}}

?>
</ol>

<h2><u>Users registered last month:</u></h2>
<ol>
<?php

$queryU = "SELECT * FROM users WHERE date<'$date'&& type!='admin' ";
$resultU=mysqli_query($conn,$queryU);
if(mysqli_num_rows($resultU)>0)
	{
    while($rowU = mysqli_fetch_array($resultU)){ ?>

<li><?php echo $rowU['name']."<br>";?></li><?php

}}
if($rowU==0)
echo "None";



?>



	</html>