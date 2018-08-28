<html>
<head>
	<link rel="stylesheet" type="text/css" href="final.css">
<title>Login Page - Joan Poon CSD275 </title>
</head>
<body>
    <h1>CSD 275 Final Project <?php echo $_COOKIE[remember_username]; ?></h1>
    <h2>you have successfully logged in.</h2>
<br>
<form action="final.php" method="post">
<input type="submit" value="Logout" name="logout" class="button1" >
</form>
<?php
if(isset($_POST["logout"]))
{
setcookie("username", "", time() - 86400 * 10);
header('Location: final.php');
}
?>
</body>
</html>