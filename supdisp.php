
<!DOCTYPE HTML>
<html>
	<head> 	
	<title>Display Supplier Details - Kalpesh Jewellery Shop</title>
	<link rel="stylesheet" type="text/css" href="cssfolder/operations.css">


	</head>

	<body>
		<img src="images/heart.jpg" width="100%" height="30%" class="header" style="margin-bottom: 10px; margin-left: 127px;">
	<div class="nav" role="navigation">
		<center><ul><li><a href="logout.php"> Logout </a></li>
		<li><a href="supdisp.php" accesskey="s">Display</a></li>
		<li><a href="supdel.php" accesskey="r">Delete</a></li>
		<li><a href="supadd.php" accesskey="a"> Add </a></li>
		<li><a href="adminlogin.php" accesskey="h"> Home</a></li>
		</ul></center>
	</div>
	<div class="imglog" role="main">
		<div class="emp"><center class="formtitle"><h2><span>S</span>upplier Details</h2><center><br>
		
	

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


				$sql="SELECT * FROM supplier";

				$rec=mysqli_query($conn,$sql);

			if(mysqli_num_rows($rec) > 0)
			{

				echo "<tr>";
				echo "<th>Supplier ID</th>";
				echo "<th>Name</th>";
				echo "<th>Company</th>";
				echo "<th>Company Code</th>";
				echo "<th>Address</th>";
				echo "<th>Contact</th>";
				echo "</tr>";

				while($stk = mysqli_fetch_array($rec))
				{

						echo "<tr>";

							echo "<td>".$stk['SID']."</td>";

							echo "<td>".$stk['SName']."</td>";

							echo "<td>".$stk['Company']."</td>";

							echo "<td>".$stk['Compcode']."</td>";

							echo "<td>".$stk['SAddr']."</td>";

							echo "<td>".$stk['SCont']."</td>";

							
						echo "</tr>";
				}
			}
			else
			{
				echo "<h3>No Supplier Present!!!</h3>";
			}
		

		?>
		</table>
		</div>
		</div>


	</body>
</html>