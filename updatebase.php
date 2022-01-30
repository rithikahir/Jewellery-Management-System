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
		$sql = "SELECT * FROM base";

		$res=mysqli_query($conn,$sql);
		
		?>
		<table style="font-size: 14px; border: 1px solid black; border-collapse: collapse;">
			<tr>
			<th style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Purity</th>
			<th  style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Rate</th>
			<th  style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Action</th>
			</tr>

		<?php
		while($row=mysqli_fetch_array($res))
		{
			echo "<tr>";
			echo "<td style='border: 1px solid black;'>"; echo $row['Pure']; echo "</td>";
			echo "<td  style='border: 1px solid black;'>"; ?><div id="Rate<?php echo $row["Pure"]; ?>"> <?php echo $row['Rate'];?> </div> <?php echo "</td>";
			
		
			
				echo "<td style='border: 1px solid black;'>"; ?>
				<input type="button" id="<?php echo $row["Pure"]; ?>" name="<?php echo $row["Pure"]; ?>" value="Edit" onclick="edit(this.id)">
				<br>
				<input type="button" id="update<?php echo $row["Pure"]; ?>" name="<?php echo $row["Pure"]; ?>" value="Update" style="visibility: hidden;" onclick="update(this.name)"> 


			<?php echo "</td>";

			echo "</tr>";
		}

		echo "</table>";
}


if($status=="update")
{
	$pure=$_GET['pure'];
	$rate=$_GET['rate'];
	
	$rate=trim($rate);
	
	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"jewellery database");
	$sql="UPDATE base SET Rate='$rate'WHERE Pure='$pure'";
	$res=mysqli_query($conn,$sql);
}

?>





