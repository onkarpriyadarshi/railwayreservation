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
}if (isset($_POST['submit'])){
$email=$_SESSION['user_info'];
$pw=$_POST['pw'];
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
if($email==$dbemail && $pw==$dbpassword)
{
		$sql1 ="DELETE FROM passengers WHERE email='$dbemail';";
		if(mysqli_query($conn,$sql1))
		{  
			echo "<script type='text/javascript'>alert('Your account has been deactivated successfully');</script>";
					header("Location: logout.php");
		
		}
		else
		{  
			echo "<script type='text/javascript'>alert('Could not deactivate your account');</script>"; 
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
<title>Deactivate account</title>
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
<form id="login-form" class="login-form" name="form1" method="post" action="deact.php" onsubmit="return validatepswd()" >
	        <div id="form-content">
	            <div class="welcome">
					Are you sure to deactivate your account?
					<br />
					Password: <input type="password" name="pw" id="pw" ><br/>
					Confirm password: <input type="password" name="pw" id="cpw" ><br/><br/>
					<center><input type="submit" name="submit" value="Deactivate account"></center>
				</div>	
	        </div>
</form>
</body>
</html>