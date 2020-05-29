<?php 
include('register.php');
if (isset($_POST['submit']))
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$age=$_POST['age'];
$mob=$_POST['mob'];
$gender=$_POST['gender'];
$email = $_POST['email'];
$pw=$_POST['pw'];
$cpw=$_POST['cpw'];
if($email != "" && $mob!="") {
    
    $result1 = mysqli_query($conn,"SELECT p_contact FROM passengers where p_contact='$mob'");
    $result2 = mysqli_query($conn,"SELECT email FROM passengers where email='$email'");
    if(mysqli_num_rows($result1)>0 && mysqli_num_rows($result2)>0)
    {
        echo "<script type='text/javascript'>alert('Email-Id and mobile number are already registered');</script>";
        $message="Registration failed";


    }
    else if(mysqli_num_rows($result1)>0)
    {
        echo "<script type='text/javascript'>alert('Mobile number is already registered');</script>";
        $message="Registration failed";    
    }
    else if(mysqli_num_rows($result2)>0){
    echo "<script type='text/javascript'>alert('Email-Id is already registered');</script>";
        $message="Registration failed";
    }
    
    else{
    	$sql = "INSERT INTO passengers (p_fname, p_lname, p_age, p_contact, p_gender, email, password) VALUES ('$fname', '$lname', '$age', '$mob', '$gender', '$email', '$pw');";
        mysqli_query($conn,$sql);
            $message = "You have been successfully registered";

   }
}

    
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>