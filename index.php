
<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="css/animate.css">
</head>

<?php
session_start();
include ('connection.php');

if(isset($_POST['action'])){

if($_POST['action']=="login"){

$email= mysqli_real_escape_string($conn,$_POST['email']);
$password= mysqli_real_escape_string($conn,$_POST['password']);
$strSQL= mysqli_query($conn,"SELECT id FROM users where email='".$email."'and password='".md5($password)."'");
$Results= mysqli_fetch_array($strSQL);
if(count($Results)>=1){

    $_SESSION['loginconfirm']=$Results['id'];
    header('Location:faqa1.php');
}else{
	$message="Invalid email or password!!";
    echo $message;
}


}elseif($_POST['action']=="signup"){

$name=mysqli_real_escape_string($conn,$_POST['name']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$password=mysqli_real_escape_string($conn,$_POST['password']);
$gender=mysqli_real_escape_string($conn,$_POST['gender']);
$query="SELECT email FROM users where email='".$email."'";
$result =mysqli_query($conn,$query);
$numResults=mysqli_num_rows($result);

if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

	$message= "Invalid email address please type a valid one!!";
    echo $message;
}elseif($numResults>=1){
	$message=$email." Email already exist!!";
    echo $message;
}
else{
	mysqli_query($conn,"insert into users(name,email,password,gender)values('".$name."','".$email."','".md5($password)."','".$gender."')");
	$message="Signup Sucessfully!!";
    echo $message;
}


}





}

?>


<!-- Login and Signup forms -->


    <div id="tabs-1" class="animated" style="background:#ccc; width:200px; height:auto;">
		<form action="" method="post">
			<p><input id="email" name="email" type="text" placeholder="Email"></p>
            <p><input id="password" name="password" type="password" placeholder="Password">
            	<input name="action" type="hidden" value="login" ></p>
            <p><input type="submit" value="Login"></p>
        </form>
    </div>

    

        <div id="tabs-2" class="animated" style="background:#ccc; width:200px; height:auto;">
        	<form action="" method="post">
        		<p><input id="name" name="name" type="text" placeholder="Name"></p>
        		<p><input id="email" name="email" type="text" placeholder="Email"></p>
        		<p><input id="password" name="password" type="password" placeholder="Password"></p>
                 <input type="radio" name="gender" value="male" required> Male
                  <input type="radio" name="gender" value="female" required> <label>Female</label>
        			<input name="action" type="hidden" value="signup"/>
        		<p><input type="submit" value="Signup"/></p>
        	</form>
        </div>

        <button class="register">Register</button>
        <button class="login">Login</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#tabs-2").hide()


            $(".login").click(function(){
                $("#tabs-1").show().addClass("rubberBand")
                $("#tabs-2").hide()
            })

            $(".register").click(function(){
                $("#tabs-2").show().addClass("flash")
                $("#tabs-1").hide()
            })
        })
    </script>

    <?php 
$message="";
?>

</html>



