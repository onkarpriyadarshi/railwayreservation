<HTML>
<HEAD>
<TITLE>Indian Railways</TITLE>
<style type="text/css">
@import url(style.css);
#logo { 
  border-radius: 25px;
    border: 1px darkblue; 
    width: 100px;
    height: 100px; 
}
* {
  color: white;
}
html { 
  background: url(img/wallpaper1.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
#main {
    width:700px;
    height: 400px;
    margin:  auto;
    margin-top: 100px;
    color:white;
    border-radius: 25px;
      padding-top: 10px;
      padding-right: 10px;
      padding-bottom: 10px;
      padding-left: 10px;
      background-color: rgba(0,0,0,0.3);

  }
  #right {
  position: absolute;
  right: 110px;
  width: 300px;
}
#below
  {
    margin-top: 120px;
  }

</style>
</HEAD>
<BODY>
<?php 
session_start();
include("header.php"); ?>
<div id="main"><div id="right"><div id="logo">
<A HREF="index.php">
<div id="right"><IMG SRC="img/logo.png" alt="Home" id="logo" width="150" height="150"></IMG></div></div>
</A></div>
<div id="below">
<h1 align="center" >Welcome to Indian Railways!</h1><br/><br/><br/>
<h2 align="center">Have a safe journey with us</h2></div>
<br/><br/><br/>
<?php
if(isset($_SESSION['user_info']))
 
  echo '<h3 align="center"><a href="booktkt.php">Click here to book</a></h3>';
else
  echo '<h3 align="center"><a href="register.php">Please login/register before booking</a></h3>';
?>
</div>
</BODY>
</HTML>