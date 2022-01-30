

<?php
session_start();

if($_SESSION["user"]==true)
{
$eid=$_SESSION["user"]; //echo $aid;
}
else
{
  header('location:firstpage.php');
}
$error="";
if(isset($_POST['add']))
{
	if(empty($_POST['gcid']) || empty($_POST['cname']) || empty($_POST['cno']) ||empty($_POST['caddr']))	
	{
			
			echo "<script type='text/javascript'>";
			echo "alert('Please fill all the details');";
			echo "location='custadd.php'";
			echo "</script>";
	}
	else
	{
		$gcid=$_POST['gcid'];
		$cname=$_POST['cname'];
		$cno=$_POST['cno'];
		$caddr=$_POST['caddr'];

		$conn=mysqli_connect("localhost","root","");
		$db=mysqli_select_db($conn,"jewellery database");

		$sql=mysqli_query($conn,"INSERT INTO customer (CName,CCont,CAddr,CGID,EID) VALUES ('$cname',$cno,'$caddr','$gcid','$eid')");

		if($sql<=0)
		{
			echo "<script type='text/javascript'>";
			echo "alert('Could not insert');";
			echo "location='custadd.php'";
			echo "</script>";		
		}
		else
		{
			$result = mysqli_query($conn,"SELECT CID FROM customer ORDER BY CID DESC LIMIT 1");
			if (mysqli_num_rows($result) > 0)
	 		{
   				$max_bid = mysqli_fetch_row($result);
  				 $ncid= $max_bid[0]; 
			}
			echo "<script type='text/javascript'>";
			echo "alert('Customer record inserted successfully');";
			echo "location='items.php?field1=".$ncid."'";
			echo "</script>";
		}
		mysqli_close($conn);

	}	
}


?>