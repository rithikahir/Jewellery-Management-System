<!DOCTYPE HTML>
<html>
	<head> 	
	<title> Update Base - Kalpesh Jewellery Shop</title>
	<link rel="stylesheet" type="text/css" href="cssfolder/operations.css">
	<script src="bower_components/sweetalert/dist/sweetalert.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="cssfolder/sweetalert2.css">

	</head>
	<body>

	<div class="header">
		<img src="images/heart.jpg" width="100%" height="30%">
	</div>		
	<div class="nav" role="navigation">
		<center><ul><li><a href="logout.php"> Logout </a></li>
		<li><a href="baseup.php">Base</a></li>	
		<li><a href="adminlogin.php"> Home</a></li>
		</ul></center>
	</div>
	<div class="imglog" role="main">
		<div class="employee" style="width: 88%;"><center class="formtitle"><h2><span>U</span>pdate Base </h2><center><br>
			<div id="details" class="details" style="overflow: scroll; width: 850px; height: 550px;">
			<center class="det" style="font-weight: bold;">Base details</center><br>
			</div>
	</div>
	</div>

		<script type="text/javascript">
	
		dispdata();
		function dispdata()
		{
			var xml=new XMLHttpRequest();
			xml.open("GET","updatebase.php?status=disp",false);
			xml.send(null);
			document.getElementById("details").innerHTML=xml.responseText;
		}

function edit(a)
{
	

	var rateid="Rate"+a;
	var txtrate="txtrate"+a;
	var rate=document.getElementById(rateid).innerHTML;
	document.getElementById(rateid).innerHTML="<input type='text' value='"+rate+"' id='"+txtrate+"'>";

	upid="update"+a;
	document.getElementById(a).style.visibility="hidden";
	document.getElementById(upid).style.visibility="visible";	

}

function update(b)
{
	
	var rateid="txtrate"+b;

	var rate1=document.getElementById(rateid).value;
	

	updateVal(b,rate1);

	  swal(
			'Updated!',
	    	'Record has been updated.',
    		'success'
	  	)

	document.getElementById(b).style.visibility="visible";
	document.getElementById("update"+b).style.visibility="hidden";

	
	document.getElementById("Rate"+b).innerHTML=rate1;
	

}

function updateVal(id,rate1)
{	
	var xml=new XMLHttpRequest();
	xml.open("GET","updatebase.php?pure="+id+"&rate="+rate1+"&status=update",false);
	xml.send(null);
	dispdata();	

}



		</script>

<script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous">
</script>

<script type="text/javascript" src="js/sweetalert2.js"></script>

	</body>
</html>