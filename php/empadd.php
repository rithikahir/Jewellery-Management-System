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

$perror="";

if(isset($_POST['add']))
{
	if( empty($_POST['EName']) || empty($_POST['Pass']) ||empty($_POST['GID']) ||empty($_POST['section'])||empty($_POST['salary'])||empty($_POST['shift'])||empty($_POST['cno'])||empty($_POST['addr']))	
	{
			echo '<script type="text/javascript">';
  			echo 'setTimeout(function () { swal("Failed to add!","Please enter all the fields!","error");';
  			echo '}, 500);</script>';	}
	else
	{
		
		$ename=$_POST['EName'];
		$pass=$_POST['Pass'];
		$gid=$_POST['GID'];
		$section=$_POST['section'];
		$shift=$_POST['shift'];
		$salary=$_POST['salary'];
		$cno=$_POST['cno'];
		$addr=$_POST['addr'];


		if(strlen($pass)<5)
		{
			$perror = "Password must be atleast 5 characters long";
		}
		else
		{

		$conn=mysqli_connect("localhost","root","");
		$db=mysqli_select_db($conn,"jewellery database");
		$query=mysqli_query($conn,"SELECT EGID FROM employee");
		if(mysqli_num_rows($query)>0)
		{
			while($row=mysqli_fetch_array($query))
			{
				if($row['EGID']==$gid)
				{
					$GLOBALS['flag']=0;
					break;
				}else $GLOBALS['flag']=1;
			}
		}
		if($GLOBALS['flag']==1){
		$sql=mysqli_query($conn,"INSERT INTO employee (EPass,EName,EAddr,ECont,Section,Shift,EGID,Salary,AID) VALUES ('$pass','$ename','$addr','$cno','$section','$shift','$gid','$salary','$aid')");
		//var_dump($sql);
		if($sql<=0)
		{
			echo '<script type="text/javascript">';
  			echo 'setTimeout(function () { swal("Could not insert!","","error");';
  			echo '}, 500);</script>';		
  		}
		else
		{
			echo "<script type='text/javascript'>";
			echo "alert('Successfully Added Employee !!!');";
			echo "location='emdisplay.php'";
			echo "</script>";			
      	}}
      	else if($GLOBALS['flag']==0)
      	{
      		echo '<script type="text/javascript">';
  			echo 'setTimeout(function () { swal("Could not insert!","Check the Govt. ID","error");';
  			echo '}, 500);</script>';		
      	}
		mysqli_close($conn);

		}
	}	
}
?>
