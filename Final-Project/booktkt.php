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
}
if (isset($_POST['submit']))
{
$train=$_POST['trains'];
$train_no = "SELECT train_no FROM trains WHERE t_name = '$train'";
$result1 = mysqli_query($conn, $train_no);
$tr_no = mysqli_fetch_assoc($result1);   
$pnr = rand(1000000000,9999999999);
$status="Confirm";

$t_fare=rand(300,4000);
$email=$_SESSION['user_info'];
$id="SELECT p_id FROM passengers WHERE email='$email'";
$result2 = mysqli_query($conn, $id);
$p_i = mysqli_fetch_assoc($result2);
$query="INSERT INTO tickets (t_no,PNR,ticket_status,ticket_fare,p_id) VALUES ('$tr_no[train_no]', '$pnr', '$status', '$t_fare', '$p_i[p_id]');";
	if(mysqli_query($conn, $query))
{  
	$message = "Ticket booked successfully";
}
	else {
		$message="Transaction failed";
	}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book a ticket</title>
	<LINK REL="STYLESHEET" HREF="STYLE.CSS">
	<style type="text/css">
		#booktkt	{
			margin:auto;
			margin-top: 100px;
			width: 40%;
			height: 60%;
			padding: auto;
			padding-top: 50px;
			padding-left: 50px;
			background-color: rgba(0,0,0,0.3);
			border-radius: 25px;
		}
		html { 
		  background: url(img/bg3.jpg) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		#journeytext	{
			color: white;
			font-size: 28px;
			font-family:"Comic Sans MS", cursive, sans-serif;
		}
		#trains	{
			margin-left: 90px;
			font-size: 15px;
		}
		#submit	{
			margin-left: 150px;
			margin-bottom: 40px;
			margin-top: 30px
		}
	</style>
	<script type="text/javascript">
		function validate()	{
			var trains=document.getElementById("trains");
			if(trains.selectedIndex==0)
			{
				alert("Please select your train");
				trains.focus();
				return false;		
			}
		}
	</script>
</head>
<body>
	<?php
		include ('header.php');
	?>
	<div id="booktkt">
	<h1 align="center" id="journeytext">Choose your journey</h1><br/><br/>
	<form method="post" name="journeyform" action="booktkt.php">
		<select id="train" name="trains">
			<option selected disabled>-------------------Select trains here----------------------</option>
			<option value="Rajdhani Exp" >Rajdhani Express - Mumbai Central to New Delhi</option>
			<option value="Duronto Exp" >Duronto Express - Mumbai Central to Ernakulum Jn</option>
			<option value="Geetanjali Exp">Geetanjali Express - Mumbai to Kolkata</option>
			<option value="Garibrath Exp" >Garib-Rath Express - Udaipur City to Jammu Tawi</option>
			<option value="Mysuru Exp" >Mysuru Express - Talguppa to Mysuru Jn</option>
			<option value="Gangadamodar Exp" >Gangadamodar Express - Dhanbad Jn to Patna Jn</option>
			<option value="Shatabadi Exp" >Shatabadi Express - Bengaluru to Howrah Jn</option>
		</select>
		<br/><br/>
		<input type="submit" name="submit" id="submit" class="button" />
	</form>
	</div>
	</body>
	</html>