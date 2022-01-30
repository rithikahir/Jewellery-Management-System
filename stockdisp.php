
<!DOCTYPE HTML>
<html>
	<head> 	
	<title> Display Stock - Kalpesh Jewellery Shop</title>
	<link rel="stylesheet" type="text/css" href="cssfolder/operations.css">


	</head>

	<body>
		<img src="images/heart.jpg" width="100%" height="30%" class="header" style="margin-bottom: 10px; margin-left: 127px;">
	<div class="nav" role="navigation">
		<center><ul><li><a href="logout.php"> Logout </a></li>
		<li><a href="stockdisp.php" accesskey="s">Display</a></li>
		<li><a href="stockup.php" accesskey="u">Update</a></li>
		<li><a href="stockadd.php" accesskey="a"> Add </a></li>
		<li><a href="adminlogin.php" accesskey="h"> Home</a></li>
		</ul></center>
	</div>
	<div class="imglog" role="main">
		<div class="emp"><center class="formtitle"><h2><span>S</span>tock Details</h2><center><br>
		
	

		<table class="fitted" style="font-size:14px; font-family: Verdana; border: 1px solid black; padding: 3px; margin-top: 15px; margin-left: auto; margin-right: auto;">

		<?php

			session_start();
			if($_SESSION["user"]==true)
			{
			$aid=$_SESSION["user"]; //echo $aid;
			}
			else
			{
 				 header('location:firstpage.php');
			}
				$conn=mysqli_connect("localhost","root","");
				$db=mysqli_select_db($conn,"jewellery database");


				$sql="SELECT * FROM jewel";

				$rec=mysqli_query($conn,$sql);

			if(mysqli_num_rows($rec) > 0)
			{

				echo "<tr>";
				echo "<th>Jewellery ID</th>";
				echo "<th>Type Of Jewellery</th>";
				echo "<th>Gold</th>";
				echo "<th>Grams</th>";
				echo "<th>Quantity</th>";
				echo "<th>Make Cost</th>";
				echo "<th>Supplier ID</th>";
				echo "</tr>";

				while($stk = mysqli_fetch_array($rec))
				{

						echo "<tr>";

							echo "<td>".$stk['JID']."</td>";

							echo "<td>".$stk['TOJ']."</td>";

							echo "<td>".$stk['Gold']."</td>";

							echo "<td>".$stk['Grams']."</td>";

							echo "<td>".$stk['SQuantity']."</td>";

							echo "<td>".$stk['MakeCost']."</td>";

							echo "<td>".$stk['SID']."</td>";

						echo "</tr>";
				}
			}
			else
			{
				echo "<h3>No Stock Present!!!</h3>";
			}
		

		?>
		</table>
		</div>
		</div>


	</body>
</html>