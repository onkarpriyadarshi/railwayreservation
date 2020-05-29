<?php 
session_start();
$conn = mysqli_connect("localhost","root","root","railway");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
$pnr=$_POST['pnr'];
$sql = "SELECT ticket_status FROM tickets WHERE PNR= '$pnr'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
	if($row==NULL)	echo "<script type='text/javascript'>alert('PNR not found');</script>";
	else echo "<script type='text/javascript'>alert('Your status is ' +'$row[ticket_status]');</script>";	
}
if (isset($_POST['cancel']))
{
	
$email=$_SESSION['user_info'];
$id="SELECT p_id FROM passengers WHERE email='$email'";
$result2 = mysqli_query($conn, $id);
$p_i = mysqli_fetch_assoc($result2);

$pnr=$_POST['pnr'];

$sql="UPDATE tickets SET ticket_status='Cancelled' WHERE PNR='$pnr' and p_id='$p_i[p_id]';";
if(mysqli_query($conn, $sql))
	echo "<script type='text/javascript'>alert('Your ticket has been cancelled');</script>";
	else echo "<script type='text/javascript'>alert('Cancellation failed');</script>";	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PNR Status</title>
	<LINK REL="STYLESHEET" HREF="STYLE.CSS">
	<style type="text/css">
		#pnr	{
			font-size: 20px;
			background-color: rgba(0,0,0,0.3);
			width: 500px;
			height: 300px;
			margin: auto;
			border-radius: 25px;
			margin: auto;
  			position: absolute;
  			left: 0; 
  			right: 0;
  			padding-top: 40px;
  			padding-bottom:20px;
  			margin-top: 100px;
 
		}
		html { 
		  background: url(img/bg2.jpg) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		#pnrtext	{
			padding-top: 20px;
		}
		#b
		{
			color: white;
		}
	</style>
</head>
<body>
<?php
include("header.php"); ?>
<center>
	<div id="pnr"><div id="b">Check your PNR status here:</div><br/><br/>
	<form method="post" name="pnrstatus" action="pnrstatus.php">
	<div id="pnrtext"><input type="text" name="pnr" size="30" maxlength="10" placeholder="Enter PNR here"></div>
	<br/><br/>
	<input type="submit" name="submit" value="Check here!" class="button" id="submit"><br/><br/>
	<?php  
		if(isset($_SESSION['user_info'])){
			echo '<form action="pnrstatus.php" method="post"><input type="submit" class="button" value="Cancel your ticket!" name="cancel" id="cancel"/></form>'; }
			else
			echo '<A HREF="register.php">Login/Register</A>';
		?>
	</form>
	</div>
</center>
</body>
</html>