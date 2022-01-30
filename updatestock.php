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
		$sql = "SELECT * FROM jewel";

		$res=mysqli_query($conn,$sql);
		
		?>
		<table style="font-size: 14px; border: 1px solid black; border-collapse: collapse;">
			<tr>
			<th style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Jewellery ID</th>
			<th  style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Type Of Jewellery</th>
			<th style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Gold</th>
			<th style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Grams</th>
			<th  style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Quantity</th>
			<th style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Make Cost</th>
			<th style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Supplier ID</th>
			<th  style="border: 1px solid black; font-size: 15px; color: Maroon; padding: 5px;">Action</th>
			</tr>

		<?php
		while($row=mysqli_fetch_array($res))
		{
			echo "<tr>";
			echo "<td style='border: 1px solid black;'>"; echo $row['JID']; echo "</td>";
			echo "<td  style='border: 1px solid black;'>"; ?><div id="TOJ<?php echo $row["JID"]; ?>"> <?php echo $row['TOJ'];?> </div> <?php echo "</td>";
			echo "<td  style='border: 1px solid black;'>"; ?><div id="Gold<?php echo $row["JID"]; ?>"> <?php echo $row['Gold'];?> </div> <?php echo "</td>";
			echo "<td style='border: 1px solid black;'>"; ?><div id="Grams<?php echo $row["JID"]; ?>"> <?php echo $row['Grams'];?> </div> <?php echo "</td>";
			echo "<td style='border: 1px solid black;'>"; ?><div id="SQuantity<?php echo $row["JID"]; ?>"> <?php echo $row['SQuantity'];?></div> <?php echo "</td>";
			echo "<td style='border: 1px solid black;'>"; ?><div id="MakeCost<?php echo $row["JID"]; ?>"> <?php echo $row['MakeCost'];?> </div> <?php echo "</td>";
			echo "<td style='border: 1px solid black;'>"; ?><div id="SID<?php echo $row["JID"]; ?>"> <?php echo $row['SID'];?> </div> <?php echo "</td>";
			
		
			echo "<td style='border: 1px solid black;'>"; ?><input type="button" id="<?php echo $row["JID"]; ?>" name="<?php echo $row["JID"]; ?>" value="Delete" onclick="delete1(this.id)"> 
				<br><br>
				<input type="button" id="<?php echo $row["JID"]; ?>" name="<?php echo $row["JID"]; ?>" value="Edit" onclick="edit(this.id)">

				<input type="button" id="update<?php echo $row["JID"]; ?>" name="<?php echo $row["JID"]; ?>" value="Update" style="visibility: hidden;" onclick="update(this.name)"> 

			<?php echo "</td>";

			echo "</tr>";
		}

		echo "</table>";
}

if($status=="delete")
{
	echo "<script>";

	$id=$_GET['JID'];

	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"jewellery database");
	$sql = "DELETE FROM jewel WHERE JID='$id'";

	$res=mysqli_query($conn,$sql);
}

if($status=="update")
{
	$jid=$_GET['jid'];
	$toj=$_GET['toj'];
	$gold=$_GET['gold'];
	$grams=$_GET['grams'];
	$quan=$_GET['quan'];
	$cost=$_GET['cost'];
	$sid=$_GET['sid'];
	
	
	$toj=trim($toj);
	$gold=trim($gold);
	$grams=trim($grams);
	$quan=trim($quan);
	$cost=trim($cost);
	$sid=trim($sid);


	$conn=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($conn,"jewellery database");
	$sql="UPDATE jewel SET TOJ='$toj',Gold='$gold',Grams='$grams',SQuantity='$quan',MakeCost='$cost',SID='$sid' WHERE JID='$jid'";
	$res=mysqli_query($conn,$sql);
}

?>





