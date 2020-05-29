<?php
session_start();
if(empty($_SESSION['user_info'])){
		echo "<script type='text/javascript'>alert('You must login first');</script>";
	}
	else
	{
		$conn = mysqli_connect("localhost","root","root","railway");
	
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}if (isset($_POST['changepw'])){
$email=$_SESSION['user_info'];
$opw=$_POST['opw'];
$npw=$_POST['npw'];
$query = "SELECT * from passengers where email='$email'";
$result = mysqli_query($conn, $query);
$numrows = mysqli_num_rows($result);
if($numrows!=0)
{
while($row = mysqli_fetch_assoc($result))
{
$dbemail = $row['email'];
$dbpassword = $row['password'];
}
if($email==$dbemail && $opw==$dbpassword)
{
		$sql1 ="UPDATE 	passengers SET password= '$npw' WHERE email= '$dbemail';";
		if(mysqli_query($conn,$sql1))
		{  
			echo "<script type='text/javascript'>alert('Password changed successfully');</script>";
		}
		else
		{  
			echo "<script type='text/javascript'>alert('Error');</script>"; 
		}  
}
else
echo "<script type='text/javascript'>alert('Incorrect password');</script>";
}
else
echo "<script type='text/javascript'>alert('User does not exist');</script>";
}
}
?>
<html>
<head>
<title>Change password</title>
<link rel="stylesheet" href="css/main.css">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/main.js"></script>
<style type="text/css">
	a:link {color: #ffffff}
	a:visited {color: #ffffff}
	a:hover {color: #ffffff}
	a:active {color: #ffffff}
</style>
<SCRIPT src="pswdcheck.js"></SCRIPT>
</head>
<body>
<?php 
include("header.php"); ?>
<form id="login-form" class="login-form" name="form1" method="post" action="changepw.php" onsubmit="return validatepswd()">
	        <div id="form-content">
	            <div class="welcome">
					Do you want to change your password?
					<br />
					Current password: <input type="password" name="opw"><br/>
					New password: <input type="password" name="npw" id="pw" ><br/>
					Confirm new password: <input type="password" name="npw" id="cpw" ><br/><br/>
					<center><input type="submit" name="changepw" value="Change password"></center>
				</div>	
	        </div>
	    </form>
	    ?>
</body>
</html>
