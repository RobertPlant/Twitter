<html>
<body>
<?php 	
	echo 'Hello ' . $_SESSION['user']['firstName'];
?>
<h1>TWITTER</h1>
<form action="login" method="POST">
Username: <input type="text" name="username"><br>
Password: <input type="password" name="password"><br>
<input type="submit" value="Log In">
</form>
Net registered? Click here to signup <a href="register">Signup</a>
</body>
</html>

