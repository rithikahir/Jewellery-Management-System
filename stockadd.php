<?php
include("php/stockadd.php");
?>
<!DOCTYPE HTML>
<html>
	<head> 	
	<title> Add Stock - Kalpesh Jewellery Shop</title>
	<link rel="stylesheet" type="text/css" href="cssfolder/operations.css">
	</head>

	<body>
	
		<img src="images/heart.jpg" width="100%" height="30%" class="header" style="margin-bottom: 10px; margin-left: 127px;">
	<div class="nav" role="navigation">
		<center><ul><li><a href="logout.php"> Logout </a></li>
		<li><a href="stockdisp.php" accesskey="s">Display</a></li>
		<li><a href="stockup.php" accesskey="u">Update</a></li>
		<li><a href="stockadd.php" accesskey="a"> Add </a></li>
		<li><a href="adminlogin.php" accesskey="h"> Home</a></li>
		</ul></center>
	</div>
	<div class="imglog" role="main">
		<div class="stock"><center class="formtitle"><h2><span>A</span>dd Stock</h2><center><br>
		<form role="form" action=" " method="post">
			<table>
			<tr>
				<td><label for="TOJ">Type of Jewellery :</label></td><td>
				<input type="text" name="TOJ" id="TOJ" list="section"  autocomplete="off"  >
				<datalist id="section">
    			<option value="Bangles">
   				<option value="Ring">
   				<option value="Mangalsutra">
   				<option value="Necklace">
   				<option value="Antic Jewellery">
   				 <?php 

                        $conn=mysqli_connect("localhost","root","");
                        $db=mysqli_select_db($conn,"jewellery database");

                        $sql=mysqli_query($conn,"SELECT DISTINCT TOJ FROM jewel");
                        {
                            while($row = mysqli_fetch_array($sql))
                                {
                                	if($row['TOJ']=="Bangles"||$row['TOJ']=="Ring"||$row['TOJ']=="Necklace"||$row['TOJ']=="Antic Jewellery"||$row['TOJ']=="Mangalsutra")
                                	{}else
                                 	echo "<option value='".$row['TOJ']."' ></option>";
                                }
                        }
                mysqli_close($conn);
                                                                                                                                                                    
                ?>
				</datalist></td>
			</tr>
			<tr>
				<td><label for="SQuantity">Quantity:</label></td>
				<td><input type="numeric" name="SQuantity" id="SQuantity"  autocomplete="off" /></td>
			</tr>
			
			<tr>
				<td><label for="Gold">Gold :</label></td>
				<td><input type="text" name="Gold" id="Gold" list="sec" autocomplete="off" >
				<datalist id="sec">
    			<option value="G24">
   				<option value="G22">
   				<option value="S24">
   				<option value="S22">
				</datalist>
			</td>
    			

			</tr>
			<tr>
				<td><label for="MakeCost">Making Cost:</label></td>
				<td><input type="numeric" name="MakeCost" id="MakeCost"  autocomplete="off" /></td>
			</tr>
			<tr>
				<td><label for="Grams">Grams :</label></td>
				<td><input type="numeric" name="Grams" id="Grams"  autocomplete="off" ></td>
			</tr>
			<tr>
				<td><label for="SID">Supplier ID :</label></td>
<td><input type="numeric" name="SID"  list="sid" id="SID" autocomplete="off" />
				<datalist id="sid">
                                            <?php 

                                            $conn=mysqli_connect("localhost","root","");
                                             $db=mysqli_select_db($conn,"jewellery database");

                                              $sql=mysqli_query($conn,"SELECT * FROM supplier");
                                              {
                                                while($row = mysqli_fetch_array($sql))
                                                {
                                                  echo "<option value='".$row['SID']."' >'".$row['SName']."'</option>";
                                                }
                                              }
                                                mysqli_close($conn);
                                                                                                                                                                    
                                             ?>

                </datalist>
                </td>
			</tr>
			</table><br>
			<input type="submit" name="Add" value="Add" id="Add" class="btn" style="width: 25%;">
			
			</form>
			
			
		</div>
		</div>
		</body>
</html>