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
if(isset($_POST['add']))
{
	if( empty($_POST['SName']) || empty($_POST['cno']) ||empty($_POST['cname']) ||empty($_POST['code'])||empty($_POST['addr']))	
	{
			echo '<script type="text/javascript">';
  			echo 'setTimeout(function () { swal("Failed to add!","Please enter all the fields!","error");';
  			echo '}, 500);</script>';	
	}
	else
	{
	
		$sname=$_POST['SName'];
		$cname=$_POST['cname'];
		$code=$_POST['code'];
		$cno=$_POST['cno'];
		$addr=$_POST['addr'];

		$conn=mysqli_connect("localhost","root","");
		$db=mysqli_select_db($conn,"jewellery database");

		$query=mysqli_query($conn,"SELECT Compcode FROM supplier");
		if(mysqli_num_rows($query)>0)
		{
			while($row=mysqli_fetch_array($query))
			{
				if($row['Compcode']==$code)
				{
					$GLOBALS['flag']=0;
					break;
				}else $GLOBALS['flag']=1;
			}
		}
		if($GLOBALS['flag']==1){
		$sql=mysqli_query($conn,"INSERT INTO supplier (SName,Company,Compcode,SAddr,SCont,AID) VALUES ('$sname','$cname','$code','$addr','$cno','$aid')");

		if($sql<=0)
		{
			echo '<script type="text/javascript">';
  			echo 'setTimeout(function () { swal("Could not insert!","","error");';
  			echo '}, 500);</script>';			
		}
		else
		{
			echo "<script type='text/javascript'>";
			echo "alert('Supplier record inserted successfully');";
			echo "location='supdisp.php'";
			echo "</script>";
		}}
			else if($GLOBALS['flag']==0)
      	{
      		echo '<script type="text/javascript">';
  			echo 'setTimeout(function () { swal("Could not insert!","Check the Company Code","error");';
  			echo '}, 500);</script>';		
      	}
		mysqli_close($conn);

	}	
}
?>
