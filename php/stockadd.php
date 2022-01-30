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
$error="";
if(isset($_POST['Add']))
{
	if( empty($_POST['SQuantity'])|| empty($_POST['TOJ'])|| empty($_POST['Gold'])|| empty($_POST['MakeCost'])|| empty ($_POST['Grams'])|| empty($_POST['SID']))
	{
			echo "<script type='text/javascript'>";
			echo "alert('Please fill all the details');";
			echo "location='stockadd.php'";
			echo "</script>";
	}
	else
	{
		
		$SQuantity=$_POST['SQuantity'];
		$TOJ=$_POST['TOJ'];
		$Gold=$_POST['Gold'];
		$MakeCost=$_POST['MakeCost'];
		$Grams=$_POST['Grams'];
		$SID=$_POST['SID'];
		
		$conn=mysqli_connect("localhost","root","");
		$db=mysqli_select_db($conn,"jewellery database");

		$query2=mysqli_query($conn,"SELECT SID FROM supplier");
		if(mysqli_num_rows($query2) > 0)
		{
			while($row = mysqli_fetch_array($query2)){
           			 if( $row['SID'] == $SID)
           			 {
           			 	$flag1=1;
           			 	break;
           			 }
           			 else $flag1=0;
           			}
		}
		else
		{
			echo "<script type='text/javascript'>";
			echo "alert('Currently no Supplier Id  present!!');";
			echo "location='stockadd.php'";
			echo "</script>";
		}

		if($flag1==1)
		{
			$sql=mysqli_query($conn,"INSERT INTO jewel( TOJ, Gold,Grams,SQuantity,MakeCost,AID,SID )VALUES 			
			('$TOJ','$Gold',$Grams,$SQuantity,$MakeCost ,'$aid',$SID)");
			if($sql)
			{
			echo "<script type='text/javascript'>";
			echo "alert('Stock inserted successfully!!');";
			echo "location='stockdisp.php'";
			echo "</script>";
			}
			else
			{
				echo "<script type='text/javascript'>";
				echo "alert('Could not add stock!!');";
				echo "location='stockadd.php'";
				echo "</script>";
			}
		}
		if($flag1==0)
    	{
    		echo "<script type='text/javascript'>";
			echo "alert('Given supplier ID not present!!1');";
			echo "location='stockadd.php'";
			echo "</script>";
    	}    

		
	}
    	

    	                              		
		mysqli_close($conn);
	}

	?>
		
