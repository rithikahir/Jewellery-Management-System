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
		$sql = "SELECT * FROM employee";

		$res=mysqli_query($conn,$sql);
		
		?>
		<table style="font-size: 14px; border: 1px solid black; border-collapse: collapse;">
			<tr>
			<th style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Employee ID</th>
			<th  style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Password</th>
			<th style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Name</th>
			<th style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Address</th>
			<th  style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Contact</th>
			<th style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Section</th>
			<th style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Shift</th>
			<th style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">GOVT. ID</th>
			<th style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Salry</th>
			<th  style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Action</th>
			</tr>

		<?php
		while($row=mysqli_fetch_array($res))
		{
			echo "<tr>";
			echo "<td style='border: 1px solid black;'>"; echo $row['EID']; echo "</td>";
			echo "<td  style='border: 1px solid black;'>"; ?><div id="EPass<?php echo $row["EID"]; ?>"> <?php echo $row['EPass'];?> </div> <?php echo "</td>";
			echo "<td  style='border: 1px solid black;'>"; ?><div id="EName<?php echo $row["EID"]; ?>"> <?php echo $row['EName'];?> </div> <?php echo "</td>";
			echo "<td style='border: 1px solid black;'>"; ?><div id="EAddr<?php echo $row["EID"]; ?>"> <?php echo $row['EAddr'];?> </div> <?php echo "</td>";
			echo "<td style='border: 1px solid black;'>"; ?><div id="ECont<?php echo $row["EID"]; ?>"> <?php echo $row['ECont'];?> </div> <?php echo "</td>";
			echo "<td style='border: 1px solid black;'>"; ?><div id="Section<?php echo $row["EID"]; ?>"> <?php echo $row['Section'];?> </div> <?php echo "</td>";
			echo "<td style='border: 1px solid black;'>"; ?><div id="Shift<?php echo $row["EID"]; ?>"> <?php echo $row['Shift'];?> </div> <?php echo "</td>";
			echo "<td style='border: 1px solid black;'>"; ?><div id="EGID<?php echo $row["EID"]; ?>"> <?php echo $row['EGID'];?> </div> <?php echo "</td>";
			echo "<td style='border: 1px solid black;'>"; ?><div id="Salary<?php echo $row["EID"]; ?>"> <?php echo $row['Salary'];?> </div> <?php echo "</td>";

			echo "<td style='border: 1px solid black;'>"; ?><input type="button" id="<?php echo $row["EID"]; ?>" name="<?php echo $row["EID"]; ?>" value="Delete" onclick="delete1(this.id)"> 
				<br><br>
				<input type="button" id="<?php echo $row["EID"]; ?>" name="<?php echo $row["EID"]; ?>" value="Edit" onclick="edit(this.id)">

				<input type="button" id="update<?php echo $row["EID"]; ?>" name="<?php echo $row["EID"]; ?>" value="Update" style="visibility: hidden;" onclick="update(this.name)"> 

			<?php echo "</td>";

			echo "</tr>";
		}

		echo "</table>";
}

if($status=="delete")
{
	echo "<script>";

	$id=$_GET['EID'];

	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"jewellery database");
	$sql = "DELETE FROM employee WHERE EID='$id'";

	$res=mysqli_query($conn,$sql);
}

if($status=="update")
{
	$eid=$_GET['eid'];
	$ename=$_GET['ename'];
	$eaddr=$_GET['eaddr'];
	$cont=$_GET['cont'];
	$sec=$_GET['sec'];
	$shift=$_GET['shift'];
	$gid=$_GET['gid'];
	$sal=$_GET['sal'];
	
	$ename=trim($ename);
	$eaddr=trim($eaddr);
	$cont=trim($cont);
	$sec=trim($sec);
	$shift=trim($shift);
	$gid=trim($gid);
	$sal=trim($sal);

	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"jewellery database");
	$sql="UPDATE employee SET EName='$ename',EAddr='$eaddr',ECont='$cont',Section='$sec',Shift='$shift',EGID='$gid',Salary='$sal' WHERE EID='$eid'";
	$res=mysqli_query($conn,$sql);
}

?>





