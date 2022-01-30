<!DOCTYPE HTML>
<html>
	<head> 	
	<style>
		td {border: 1px #DDD solid; padding: 5px; cursor: pointer;}

		.selected {
    	background-color: brown;
    	color: #FFF;
			}
	</style>	
	<link rel="stylesheet" type="text/css" href="cssfolder/operations.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"> </script>
	<script src="bower_components/sweetalert/dist/sweetalert.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="cssfolder/sweetalert2.css">


	</head>

	<body>
	<div class="header">
		<img src="images/heart.jpg" width="100%" height="30%">
	</div>		
	<div class="nav">
		<center><ul><li><a href="logout.php"> Logout </a></li>
		<li><a href="transactions.php"> Transaction</a></li>
		<li><a href="custdisp.php"> Customer</a></li>
		<li><a href="report.php"> Report</a></li>
		<li><a href="adminlogin.php"> Home</a></li>
		</ul></center>
	</div>
	<div class="imglog">
		<div class="trans"><center class="formtitle"><span>S</span>how Report<center><br>
		<form action="" method="post">
		<table class='fitted'> 
		<tr>
			<td>From:</td><td><input type="date" name="from"></td><td>To:</td><td><input type="date" name="to"></td><td><input type="submit" name="show" value="Show"></td>
		</tr>
		</table>		
		</form>

		<div style="width: 700px; height: 500px; background-color: snow; margin-top: 20px; overflow:scroll; font-size: 14px;">

			<table id="table" style="font-size: 14px;">

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

if(isset($_POST['show']))
{

	if(empty($_POST['from']) || empty($_POST['to']))
	{
			echo '<script type="text/javascript">';
  			echo 'setTimeout(function () { swal("Enter both dates!","","error");';
  			echo '}, 500);</script>';
	}
	else 
	{
		$conn=mysqli_connect("localhost","root","");
		$db=mysqli_select_db($conn,"jewellery database");


	if(empty($_POST['from']) && !empty($_POST['to']))
		{
		$today= date("Y-m-d");
		$from=$_POST['from'];
		$sql=mysql_query($conn,"SELECT * FROM bill WHERE (PDate between '$from' AND '$today')");			

		}
		else
		{

		$from=$_POST['from'];
		$to=$_POST['to'];

		$sql=mysqli_query($conn,"SELECT * FROM bill WHERE (PDate between '$from' AND '$to')");			
		}
		if(!$sql)
		{
			echo '<script type="text/javascript">';
  			echo 'setTimeout(function () { swal("No transactions found!","","error");';
  			echo '}, 500);</script>';
		}
		else
		{
			if(mysqli_num_rows($sql) > 0)
			{
				echo "<tr>";
				echo "<th>BID</th>";
				echo "<th>BQty</th>";
				echo "<th>BAmt</th>";
				echo "<th>Tax</th>";
				echo "<th>PDate</th>";
				echo "<th>TAmt</th>";
				echo "<th>EID</th>";
				echo "<th>CID</th>";
				echo "</tr>";

				while($stk = mysqli_fetch_array($sql))
				{

						echo "<tr>";

							echo "<td>".$stk['BID']."</td>";

							echo "<td>".$stk['BQuantity']."</td>";

							echo "<td>".$stk['BAmount']."</td>";

							echo "<td>".$stk['Tax']."</td>";

							echo "<td>".$stk['PDate']."</td>";

							echo "<td>".$stk['TAmount']."</td>";

							echo "<td>".$stk['EID']."</td>";

							echo "<td>".$stk['CID']."</td>";

						echo "</tr>";
				}
			}
		}
		mysqli_close($conn);
	}	
}

?>



		</table>

		</div>					

	</div>
	</div>
	
<script>

		$("#table tr").click(function(){
  		 $(this).addClass('selected').siblings().removeClass('selected');    
  		  $value=$(this).find('td:first').html();
   		alert('Selected BID ' + $value);  
   		window.location.href="transbill.php?field1="+$value;  
		});

		$('.ok').on('click', function(e){
    	alert($("#table tr.selected td:first").html());
		});
		</script>


<script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous">
</script>

<script type="text/javascript" src="js/sweetalert2.js"></script>


	</body>
</html>