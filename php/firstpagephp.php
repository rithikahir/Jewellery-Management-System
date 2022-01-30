<?php
 session_start();
if(isset($_POST['submit']))
{
	if(empty($_POST['id']) || empty($_POST['pass']))
	{
			echo '<script type="text/javascript">';
  			echo 'setTimeout(function () { swal("Failed to login!","Please enter Username and Password!","error");';
  			echo '}, 500);</script>';
	}
	else
	{
		$id=$_POST['id'];
		$pass=$_POST['pass'];

		$conn = mysqli_connect("localhost","root","")
or die("cannot connect to localhost!");
		$db=mysqli_select_db($conn,"jewellery database")
or die("cannot connect to a database!");
		$query=mysqli_query($conn,"SELECT * FROM admin WHERE Password='$pass' AND AID='$id'");

		$rows=mysqli_num_rows($query);

		if($rows == 1)
		{
			$_SESSION["user"]=$id;
			header("Location: adminlogin.php");
		}
		else
		{
			$query=mysqli_query($conn,"SELECT * FROM employee WHERE EPass='$pass' AND EID='$id'");
			$rows=mysqli_num_rows($query);

			if($rows == 1)
			{
				$_SESSION["user"]=$id;
				header("Location: custadd.php");
			}
			else
			{
			echo '<script type="text/javascript">';
  			echo 'setTimeout(function () { swal("Oops..!","Username or Password is invalid!","error");';
  			echo '}, 500);</script>';

			}
		}
		mysqli_close($conn);
	}	
}
?>