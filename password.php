<!DOCTYPE HTML>
<hmtl>
<head>
</head>
<body>
	<a href="settings.php">Go back</a>
<h2> Here you can change your password</h2>


<p> Please enter your new password </p>

<form action="changepassword.php" method="post" >

	Enter your password:<br>

	<input type="password" placeholder="actual password" name="password"required><br>
	Enter your new password:<br>
	<input type="password" placeholder=" new password goes here" name="newpassword"required><br>
	<input type="password" placeholder=" repeat passord" name="repeat"required><br>
	<input type="submit" name="change" value="change">


</form>

	</body>
</html>