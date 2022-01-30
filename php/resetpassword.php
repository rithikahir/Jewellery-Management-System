<?php
		session_start();
		if($_SESSION["user"]==false)
			{
				header('location:firstpage.php');
			}

if(isset($_POST['reset']))
{
	if(empty($_POST['eid']) || empty($_POST['npass']) || empty($_POST['cnpass']))
	{
			echo '<script type="text/javascript">';
  			echo 'setTimeout(function () { swal("Empty Fields!","","error");';
  			echo '}, 500);</script>';	
	}
	else
	{
		$eid=$_POST['eid'];
		$conn=mysqli_connect("localhost","root","");
		$db=mysqli_select_db($conn,"jewellery database");
		$query=mysqli_query($conn,"SELECT * FROM employee WHERE EID='$eid'");
		$rows=mysqli_num_rows($query);

		if($rows == 1)
		{
			$npass=$_POST['npass'];
			$cnpass=$_POST['cnpass'];

			if($npass!=$cnpass)
			{
				echo '<script type="text/javascript">';
  				echo 'setTimeout(function () { swal("Passwords do not match!","","error");';
  				echo '}, 500);</script>';	
			}
			else
			{
				$sql=mysqli_query($conn,"UPDATE employee SET EPass='$npass' WHERE EID='$eid'");
				//$res=mysqli_num_rows($sql);

				if($sql)
				{
					echo "<script type='text/javascript'>";
					echo "alert('Done!!');";
					echo "location='emdisplay.php'";
					echo "</script>";
				}
			}		
		}
		else
		{
			echo '<script type="text/javascript">';
  			echo 'setTimeout(function () { swal("Invalid ID!","","error");';
  			echo '}, 500);</script>';	
		}
		mysqli_close($conn);

	}	
}
?>
