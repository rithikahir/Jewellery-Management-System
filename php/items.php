
<?php  
//echo 'From script POST is: <pre>',print_r($_POST,true),'</pre>';  
session_start();

if($_SESSION["user"]==true)
{
$eid=$_SESSION["user"]; //echo $aid;
}
else
{
  header('location:firstpage.php');
}
$conn=mysqli_connect("localhost","root","");
		$db=mysqli_select_db($conn,"jewellery database");



if(isset($_POST['genbill']))
{

	$name=$_POST['name'];
	$quant=$_POST['quant'];

	if(($name[0] || $quant[0])==0)
		{
			echo "<script type='text/javascript'>";
			echo "alert('Enter atleast one JID !!');";
			echo "location='items.php'";
			echo "</script>";
		}
	
			
	else
		{

			$cid=$_GET["field1"];
			$query = mysqli_query($conn,"INSERT INTO bill (Tax,PDate,EID,CID) VALUES (20,curdate(),'$eid','$cid')" );
			$result = mysqli_query($conn,"SELECT BID FROM bill ORDER BY BID DESC LIMIT 1");
			if (mysqli_num_rows($result) > 0)
	 		{
   				$max_bid = mysqli_fetch_row($result);
  				 $nbid= $max_bid[0]; 
			}


	    	for($i=0;$i<count($name);$i++)//foreach($_POST['name'] as $key=>$value)  
				{
					$GLOBALS['out']=1;

					$jid = mysqli_real_escape_string($conn,$name[$i]);
					$quan= intval($quant[$i]); 
					if($quan>5)
					{
							$GLOBALS['out'] =0; break;
							echo "<script type='text/javascript'>";
							echo "alert('Purchase Quantity Exceeding Limit !!');";
							echo "location='items.php'";
							echo "</script>";
							

					}
					else if($quan==0)
					{
							$GLOBALS['out'] =0; break;
							echo "<script type='text/javascript'>";
							echo "alert('Invalid Entry for Quantity !!');";
							echo "location='items.php'";
							echo "</script>";


					}
					
					$query1=mysqli_query($conn,"SELECT * FROM jewel WHERE JID='".$jid."'");
					if(mysqli_num_rows($query1) > 0)
						{
							//var_dump($query1);
							while($row = mysqli_fetch_array($query1))
								{
									$grams=$row['Grams'];
									$gold=$row['Gold'];
									$make=$row['MakeCost'];
								}
							$query4=mysqli_query($conn,"SELECT Rate FROM base WHERE Pure='".$gold."'");
							if(mysqli_num_rows($query4)>0)
							{
								while($col=mysqli_fetch_array($query4))
								{
									$rate=$col['Rate'];
								}
							}


							$query2 = mysqli_query($conn,"INSERT INTO bill_jewellery (BID,JID,JQuantity,Grams,Gold,JRate,JMakeCost) VALUES ('$nbid','$jid','$quan','$grams','$gold','$rate','$make')" );
							if($query2 > 0)
							{
								$flag=1;
							}
							else
							{
								$flag=0;
							}
											

						}
					else
						{
							$GLOBALS['out'] =0;break;
							echo "<script type='text/javascript'>";
							echo "alert('Jewellery Id not present !!');";
							echo "location='items.php'";
							echo "</script>";
						}
				}

				
						if($flag == 1)
						{
							echo "<script type='text/javascript'>";
							echo "alert('Jewellery added successfully !!');";
							echo "location='bill.php?field1=".$nbid."&field2=".$cid."'";
							echo "</script>";
						}
						else if($flag==0)
						{
							$GLOBALS['out'] =0;
							echo "<script type='text/javascript'>";
							echo "alert('Jewellery not added !!');";
							echo "location='items.php'";
							echo "</script>";
						}
						if($GLOBALS['out']== 0)
						{
							$query3=mysqli_query($conn,"DELETE  FROM bill WHERE BID='".$nbid."'");

						}
		}


}
	
mysqli_close($conn);
	
?>
 
 