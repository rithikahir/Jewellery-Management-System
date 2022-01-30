<?php
include("php/resetpassword.php");
?>
<!DOCTYPE HTML>
<html>
	<head> 	
	<link rel="stylesheet" type="text/css" href="cssfolder/operations.css">
	<script src="bower_components/sweetalert/dist/sweetalert.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="cssfolder/sweetalert2.css">
	</head>

	<body>
	<div class="header">
		<img src="images/heart.jpg" width="100%" height="30%">
	</div>		
	<div class="nav">
		<center><ul><li><a href="logout.php"> Logout </a></li>
		<li><a href="emdisplay.php">Display</a></li>
		<li><a href="adminlogin.php"> Home</a></li>
		</ul></center>
	</div>
	<div class="passdiv">
		<div class="password"><center class="formtitle"><span>R</span>eset Password<center><br>
		<form action="" method="post">
		<table class='fitted'> 
		<tr>
			<td>Employee ID:</td><td><input type="text" name="eid" id="eid" autocomplete="off"></td>
		</tr>
		<tr>
			<td>New Password:</td><td><input type="password" name="npass" id="npass"></td>
		</tr>
		<tr>	
			<td>Confirm New Password:</td><td><input type="password" name="cnpass" id="cnpass"></td>
		</tr>
		<tr>
		<td colspan="2"><center><input type="submit" name="reset" id="reset" value="Reset" class="btn"></center></td>
		</tr>
		</table>		
		</form>
	</div>
	</div>
	
	</body>
</html>


<script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous">
</script>

<script type="text/javascript" src="js/sweetalert2.js"></script>


	</body>
</html>