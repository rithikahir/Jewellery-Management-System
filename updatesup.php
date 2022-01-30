


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

$status=$_GET['status'];

if($status=="disp")
{
		$conn=mysqli_connect("localhost","root","");
		$db=mysqli_select_db($conn,"jewellery database");
		$sql = "SELECT * FROM supplier";

		$res=mysqli_query($conn,$sql);
		
		?>
		<table style="font-size: 14px; border: 1px solid black; border-collapse: collapse;">
			<tr>
			<th style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Supplier ID</th>
			<th style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Name</th>
			<th style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Address</th>
			<th  style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Contact</th>
			<th style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Company</th>
			<th style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Company Code</th>
			<th  style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Action</th>
			</tr>

		<?php
		while($row=mysqli_fetch_array($res))
		{
			echo "<tr>";
			echo "<td style='border: 1px solid black;'>"; echo $row['SID']; echo "</td>";
			echo "<td  style='border: 1px solid black;'>"; ?><div id="SName<?php echo $row["SID"]; ?>"> <?php echo $row['SName'];?> </div> <?php echo "</td>";
			echo "<td style='border: 1px solid black;'>"; ?><div id="SAddr<?php echo $row["SID"]; ?>"> <?php echo $row['SAddr'];?> </div> <?php echo "</td>";
			echo "<td style='border: 1px solid black;'>"; ?><div id="SCont<?php echo $row["SID"]; ?>"> <?php echo $row['SCont'];?> </div> <?php echo "</td>";
			echo "<td style='border: 1px solid black;'>"; ?><div id="Company<?php echo $row["SID"]; ?>"> <?php echo $row['Company'];?> </div> <?php echo "</td>";
			echo "<td style='border: 1px solid black;'>"; ?><div id="Compcode<?php echo $row["SID"]; ?>"> <?php echo $row['Compcode'];?> </div> <?php echo "</td>";
			

			echo "<td style='border: 1px solid black;'>"; ?><input type="button" id="<?php echo $row["SID"]; ?>" name="<?php echo $row["SID"]; ?>" value="Delete" onclick="delete1(this.id)"> 
				<br><br>
				<input type="button" id="<?php echo $row["SID"]; ?>" name="<?php echo $row["SID"]; ?>" value="Edit" onclick="edit(this.id)">

				<input type="button" id="update<?php echo $row["SID"]; ?>" name="<?php echo $row["SID"]; ?>" value="Update" style="visibility: hidden;" onclick="update(this.name)"> 

			<?php echo "</td>";

			echo "</tr>";
		}

		echo "</table>";
}

if($status=="delete")
{
	echo "<script>";

	$id=$_GET['SID'];

	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"jewellery database");

	

	$sql = "DELETE FROM supplier WHERE SID='$id'";

	$res=mysqli_query($conn,$sql);
	
}

if($status=="update")
{
	$sid=$_GET['sid'];
	$sname=$_GET['sname'];
	$saddr=$_GET['saddr'];
	$scont=$_GET['scont'];
	$comp=$_GET['comp'];
	$code=$_GET['code'];
	
	
	$sname=trim($sname);
	$saddr=trim($saddr);
	$scont=trim($scont);
	$comp=trim($comp);
	$code=trim($code);
	

	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"jewellery database");
	$sql="UPDATE supplier SET SName='$sname',SAddr='$saddr',SCont='$scont',Company='$comp',Compcode='$code' WHERE SID='$sid'";
	$res=mysqli_query($conn,$sql);
}

?>



