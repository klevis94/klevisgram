<?php
require("mysqlconnect.php"); 


session_start();
if(!isset($_SESSION['loginconfirm'])) 

 header('Location:index.php');else

 
?>
<!DOCTYPE HTML>

<html>
    <head>
	</head>
	<body>
		<a href="profile.php">Go back</a>
<h2>Welcome to settings page</h2>
<ul>
<li><a href="username.php"> Change username</a></li><br><br>
<li><a href="email.php">Change email</a></li><br><br>
<li><a href="password.php">Change password</a></li><br><br>
<li><a href="deactivate.php" class="confirmation">Deactivate account</a></li>
</ul>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>
$('.confirmation').on('click', function () {
        return confirm('Are you sure you want to deactivate your account?');
    });
 </script>





	</body>
</html>
