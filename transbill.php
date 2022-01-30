
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



$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"jewellery database");

//$bid=$_GET["field1"];
$querry=mysqli_query($conn,"SELECT * FROM bill where BID='".$_GET['field1']."'");
if(mysqli_num_rows($querry) > 0)
		{
			 while($row = mysqli_fetch_array($querry)){
           			 $quantity=$row['BQuantity']; $amount=$row['BAmount']; $tax=$row['Tax']; $pdate=$row['PDate'];  $tamt=$row['TAmount'];
           			  $eeid=$row['EID'];  $cid=$row['CID'];
           			}
          }

  mysqli_close($conn);

  //fetching base values

$conn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($conn,"jewellery database");

$querry=mysqli_query($conn,"SELECT * FROM base");
if(mysqli_num_rows($querry) > 0)
		{
			 while($row = mysqli_fetch_array($querry)){

			 	if($row['Pure']=='S24') $GLOBALS['S24']=$row['Rate'];
				else if($row['Pure']=='S22') $GLOBALS['S22']=$row['Rate'];
			 	else if($row['Pure']=='G24') $GLOBALS['G24']=$row['Rate'];
			 	else if($row['Pure']=='G22') $GLOBALS['G22']=$row['Rate'];
           		
           			}
           			
          }

  mysqli_close($conn);




//Creating table for items


          function get_jewellery()
          {
          	$conn=mysqli_connect("localhost","root","");
			$db=mysqli_select_db($conn,"jewellery database");

				//$bid=$_GET["field1"];
          		$sql=mysqli_query($conn,"SELECT * FROM bill_jewellery WHERE   BID='".$_GET['field1']."'");
          			$jewellery=array();
					 if(mysqli_num_rows($sql)>0)
					 {
					 	while($row=mysqli_fetch_object($sql))
					 	{ 
					 		$jewellery[]=$row;
					 	}
					 }
					  mysqli_close($conn);

					 return $jewellery;
          }
          function get_table()
          {
          	$jewellery=get_jewellery();

          		$i=1;
          		$table_str='<table id="jewellery_table">';
          		$table_str.='<tr><td>JID</td><td>Quantity</td><td>Grams</td><td>Gold</td><td>Rate</td><td>Making Cost</td><td>Amount</td></tr>';
          	foreach($jewellery as $jewel)
          	{
          		$class='';
          		if($i%=2)
          		{
          			$class='row_even';
          		}
          		else
          		{
          			$class='row_odd';
          		}
          		$table_str.='<tr class="'.$class.'">';
          		$table_str.='<td>'.$jewel->JID.'</td><td>'.$jewel->JQuantity.'</td><td>'.$jewel->Grams.'</td><td>'.$jewel->Gold.'</td><td>'.$jewel->JRate.'</td><td>'.$jewel->JMakeCost.'</td><td>'.$jewel->JAmount.'</td>';
          		$table_str.='</tr>';
          		$i++;
          	}
          		$table_str.='</table>';
          		return $table_str;
          }


         
?>

<!DOCTYPE HTML>
<html>
	<head> 	
	<link rel="stylesheet" type="text/css" href="cssfolder/bill.css">
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	
	<style type="text/css">
	#jewellery_table
	{
		border : 1px solid gray;
		border-collapse: collapse;
	}
	#jewellery_table td,th
	{
		border : 1px solid gray;
		font-family: Arial; font-size: 10pt;
	}
	.row_even
	{
		background-color:#F8F9F9  ;
	}
	.row_odd
	{
		background-color:#FDFEFE  ;
	}
	</style>

      	</head>

	<body>
	<div class="header">
		<img src="images/heart.jpg" width="100%" height="30%">
	</div>		
	<div class="nav">
		<center><ul>
		<li><a href="logout.php"> Logout</a></li>
		<li><a href="transactions.php"> Transactions</a></li>
		<li><a href="adminlogin.php">Home </a></li>
		</ul></center>
	</div>
	<div class="imglog">
                   <div class="outer">
		<div class="stock"><center class="formtitle"><span>B</span>ill Details<center><br>
			<form>
			<table>
  				<tr>
    				<td>Bill No : </td>
  				 <td><input type="numeric" name="billno" id="billno" value="<?= $_GET["field1"]?>"  readonly="readonly"/></td>
  				</tr>
				<tr>
    				<td>Customer ID : </td>
  				 <td><input type="numeric" name="cid" id="cid" value="<?= $cid ?>"  readonly="readonly" /></td>
  				</tr>
				<tr>
    				<td>Employee ID : </td>
  				 <td><input type="numeric" name="eid" id="eid" value="<?= $eeid ?>" readonly="readonly" /></td>
  				</tr>
				<tr>
    				<td>Date : </td>
  				<td><input type="date" name="date" id="date" value="<?= $pdate ?>" readonly="readonly"/></td>
  				</tr>			
				<tr colspan="2">
				<td>Items: </td>
				</tr>
				<tr colspan="2">
				<?php

					echo get_table();
					
				?>
				</tr>
				</table>
				<table>
				<tr>
    				<td>Total Quantity of Purchase : </td>
  				 <td><input type="numeric" name="quant" id="quant" value="<?= $quantity ?>" readonly="readonly"/></td>
  				</tr>
  				<tr>
    				<td>Total Amount of Gold  : </td>
  				 <td><input type="numeric" name="quant" id="amount" value="<?= $amount ?>" readonly="readonly"/></td>
  				</tr>
				<tr>
    				<td>GST ( % 6) : </td>
  				 <td><input type="numeric" name="tax"  id="tax" value="<?= $tax ?>" readonly="readonly" /></td>
  				</tr>
  				<tr>
				<td>Total Amount : </td>
  				<td> <input type="numeric" name="amount" id="amount" value="<?=$tamt?>" readonly="readonly" /></td>
  				 </tr>
  				</table>
  				
  		</form>


		</div>
	</div>
	</div>
	</div>
	</body>
</html>

	