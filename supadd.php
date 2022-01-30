<?php
include("php/supadd.php");
?>

<!DOCTYPE HTML>
<html>
	<head> 	
	<title> Add Supplier - Kalpesh Jewellery Shop</title>
	<link rel="stylesheet" type="text/css" href="cssfolder/operations.css">
	<script src="bower_components/sweetalert/dist/sweetalert.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="cssfolder/sweetalert2.css">
	</head>

	<body>
	<div class="header">
		<img src="images/heart.jpg" width="100%" height="30%">
	</div>		
	<div class="nav" role="navigation">
		<center><ul><li><a href="logout.php"> Logout </a></li>
		<li><a href="supdisp.php" accesskey="s">Display</a></li>
		<li><a href="supdel.php" accesskey="r">Delete</a></li>
		<li><a href="supadd.php" accesskey="a"> Add </a></li>
		<li><a href="adminlogin.php" accesskey="h"> Home</a></li>
		</ul></center>
	</div>
	<div class="custdiv" role="main">
		<div class="supp"><center class="formtitle"><h2><span>A</span>dd Supplier Details</h2><center><br>
		<form action="" role="form" method="post">
		<table class='fitted'> 
		
		<tr>
			<td><label for="name">Name:</label></td>
			<td><input type="text" id="name" name="SName" autocomplete="off" ></td>
		</tr>
		<tr>	
			<td><label for="company">Company Name:</label></td>
			<td><input type="text" id="company" name="cname" autocomplete="off" ></td>
		</tr>
		<tr>	
			<td><label for="code">Company Code:</label></td>
			<td><input type="text" id="code" name="code" autocomplete="off" ></td>
		</tr>
		<tr>
			<td><label for="contact">Contact No:</label></td>
			<td><input type="text" id="contact" name="cno" autocomplete="off" ></td>
		</tr>
		<tr>
			<td><label for="address">Address:</label></td>
			<td><textarea rows="3" cols="22" id="address" name="addr" autocomplete="off" placeholder="Enter Address"></textarea></td>
		</tr>
		<tr>
		<td colspan="2"><center><input type="submit" name="add" value="Add" class="btn"></center></td>
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