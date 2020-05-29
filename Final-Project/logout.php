<?php
	session_start();
	if(empty($_SESSION['user_info'])){
		echo "<script type='text/javascript'>alert('You must login first');</script>";
	}
	else
	{
session_destroy();
unset($_SESSION['username']);
	$message="You have been logged out";
	echo "<script type='text/javascript'>alert('$message');</script>";
	header("location: login.php");
}
?>
<html>
<head>
<title>Logout</title>
<link rel="stylesheet" href="css/main.css">
<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/main.js"></script>
<style type="text/css">
a:link {color: #ffffff}
a:visited {color: #ffffff}
a:hover {color: #ffffff}
a:active {color: #ffffff}
</style>
</head>
<body>
<?php 
include("header.php"); ?>
</form>
</body>
</html>