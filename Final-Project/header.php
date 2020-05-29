<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="s1.css" type="text/css">
<style type="text/css">
  li {
    font-family: sans-serif;
    font-size:15px;
  }
  .dropbtn {
  background-color: #b35018;
  color: white;
  padding: 8px;
  font-size: 15px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 165px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: orange;}
</style>
<script src="jquery.js"></script>
        <script>
            $(document).ready(function(){
              $("#Logout").hide();
            };
            $(document).ready(function(){
                $("#user").hover(function(){
                    $("#Logout").toggle("slow");
                });
            });
        </script>
</head>
<body link="white" alink="white" vlink="white">
     <div class="container dark">
        <div class="wrapper">
          <div class="Menu">
            <ul id="navmenu">
            <li><A HREF="index.php">Home</A></li>
            <li><A HREF="pnrstatus.php">PNR Status</A></li>
            <li><A HREF="booktkt.php">Plan My Journey</A></li>
            <li><?php  
        if(isset($_SESSION['user_info'])){
          echo '<div id="dropdown">'.$_SESSION['user_info'].'<div id="Logout" style="display:none">Logout</div>';
        }
        else
          echo '<A HREF="register.php">Login/Register</A>';
        ?></li>
            <li>
              <div class="dropdown">
              <button class="dropbtn">More Options</button>
              <div class="dropdown-content">
              <a href="changepw.php">Change Password</a>
              <a href="deact.php">Deactivate Account</a>
              <a href="logout.php">Logout</a>
              </div>
              </div>
            </li>
            </ul>
          </div>
        </div>
      </div>
</body>
</html>