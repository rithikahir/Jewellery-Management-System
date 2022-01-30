
<!DOCTYPE HTML>
<html>
	<head> 	
		<style>
		td {border: 1px #DDD solid; padding: 5px; cursor: pointer;}

		.selected {
    	background-color: maroon;
    	color: #FFF;
			}
	</style>
	<link rel="stylesheet" type="text/css" href="cssfolder/operations.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"> </script>
	<script type="text/javascript">
		 function idForm(){
  		 var selectvalue = $('input[name=choice]:checked', '#idForm').val();


		if(selectvalue == "pc"){
		window.open('custadd.php','_self');
		return true;
		}
		else if(selectvalue == "ps2"){
		window.open('custinfo.php','_self');
		return true;
		}
		return false;
		};


	</script>

	</head>

	<body>
		<img src="images/heart.jpg" width="100%" height="30%" class="header" style="margin-bottom: 10px; margin-left: 127px;">
	<div class="nav">
		<center><ul><li><a href="logout.php"> Logout </a></li>
		<li><a href="custadd.php"> Home</a></li>
		</ul></center>
	</div>
	<div class="imglog">
		<div class="radio">
		<form action="" method="post" id="idForm">
		<input type="radio" onclick="idForm()"  name="choice" id="nc" value="pc"/>
		<label for="nc">New Customer </label><br/>
		<input type="radio"  onclick="idForm()" name="choice" id="ec" value="ps2"/>
<label for="ec">Existing Customer </label>

		</form>
		</div>

		<div class="cust"><center class="formtitle"><span>C</span>ustomer Details<center><br>
			<h5>Govt ID :*<input type="text" id="number"> <input type="button" onclick="changeit()" value="search"></h5><br>
			<script>
			function changeit() {
    		var valueToFind = $('#number').val();
    		$('#table > tbody> tr').each(function(index) {
        	var firstTd = $(this).find('td:last');
        	 var lastTd = $(this).find('td:first');
        	if ($(firstTd).text() == valueToFind) {
        		$field1 = $(lastTd).text();
           	alert('Selected CID ' + $field1);  
   			window.location.href="items.php?field1="+$field1; 
        	}
    		})
			}
			</script>
		<table id="table" class="fitted" style="font-size:14px; font-family: Verdana; border: 1px solid black; padding: 3px; margin-top: 15px; margin-left: auto; margin-right: auto;">

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

			
				$conn=mysqli_connect("localhost","root","");
				$db=mysqli_select_db($conn,"jewellery database");


				$sql="SELECT * FROM customer";

				$rec=mysqli_query($conn,$sql);

			if(mysqli_num_rows($rec) > 0)
			{

				echo "<tr>";
				echo "<th>CID</th>";
				echo "<th>Name</th>";
				echo "<th>Address</th>";
				echo "<th>Contact</th>";
				echo "<th>Govt. ID</th>";
				echo "</tr>";

				while($stk = mysqli_fetch_array($rec))
				{

						echo "<tr>";

							echo "<td>".$stk['CID']."</td>";

							echo "<td>".$stk['CName']."</td>";

							echo "<td>".$stk['CAddr']."</td>";

							echo "<td>".$stk['CCont']."</td>";

							echo "<td>".$stk['CGID']."</td>";


							
						echo "</tr>";
				}
			}
			else
			{
				echo "<h3>No Customer Present!!!</h3>";
			}
		

		?>
		</table>
		</div>
		</div>
		<script>

		$("#table tr").click(function(){
  		 $(this).addClass('selected').siblings().removeClass('selected');    
  		  $value=$(this).find('td:first').html();
   		alert('Selected CID ' + $value);  
   		window.location.href="items.php?field1="+$value;  
		});

		$('.ok').on('click', function(e){
    	alert($("#table tr.selected td:first").html());
		});
		</script>

	</body>
</html>