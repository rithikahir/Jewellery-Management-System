<?php 

$id= $_GET["field1"];
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p><?php echo $id; ?></p>

<a href="transactions.php">Back</a>
</body>
</html>

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
	if(empty($_POST['EID']) && empty($_POST['date']))
	{
			echo '<script type="text/javascript">';
  			echo 'setTimeout(function () { swal("Cannot show transactions!","Please enter Employee ID or Date!","error");';
  			echo '}, 500);</script>';
	}
	else
	{
		$eid=$_POST['EID'];
		$dt=$_POST['date'];

		$conn=mysqli_connect("localhost","root","");
		$db=mysqli_select_db($conn,"jewellery database");

		if(empty($_POST['EID']) && !empty($_POST['date']))
		{
			$sql=mysqli_query($conn,"");
		}
		elseif (!empty($_POST['EID']) && empty($_POST['date'])) 
		{
			$sql=mysqli_query($conn,"");*
		}
		else
		{
			$sql=mysqli_query($conn,"");			
		}

		if($sql<=0)
		{
			echo '<script type="text/javascript">';
  			echo 'setTimeout(function () { swal("No transactions found!","","error");';
  			echo '}, 500);</script>';
		}
		else
		{

		}
		mysqli_close($conn);
	}	
}

?>
