<!DOCTYPE HTML>
<html>
	<head> 	
	<title> Update Stock - Kalpesh Jewellery Shop</title>
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
		<li><a href="stockdisp.php" accesskey="s">Display</a></li>
		<li><a href="stockup.php" accesskey="u">Update</a></li>
		<li><a href="stockadd.php" accesskey="a"> Add </a></li>
		<li><a href="adminlogin.php" accesskey="h"> Home</a></li>
		</ul></center>
	</div>
	<div class="imglog" role="main">
		<div class="employee" style="width: 88%;"><center class="formtitle"><h2><span>U</span>pdate Stock </h2><center><br>
			<div id="details" class="details" style="overflow: scroll; width: 850px; height: 550px;">
			<center class="det" style="font-weight: bold;">Stock details</center><br>
			</div>
	</div>
	</div>

		<script type="text/javascript">
	
		dispdata();
		function dispdata()
		{
			var xml=new XMLHttpRequest();
			xml.open("GET","updatestock.php?status=disp",false);
			xml.send(null);
			document.getElementById("details").innerHTML=xml.responseText;
		}

function edit(a)
{
	

	var tojid="TOJ"+a;
	var txttoj="txttoj"+a;
	var toj=document.getElementById(tojid).innerHTML;
	document.getElementById(tojid).innerHTML="<input type='text' value='"+toj+"' id='"+txttoj+"'>";

	var goldid="Gold"+a;
	var txtgold="txtgold"+a;
	var gold=document.getElementById(goldid).innerHTML;
	document.getElementById(goldid).innerHTML="<input type='text' value='"+gold+"' id='"+txtgold+"'>";

	var gramid="Grams"+a;
	var txtgram="txtgram"+a;
	var gram=document.getElementById(gramid).innerHTML;
	document.getElementById(gramid).innerHTML="<input type='text' value='"+gram+"' id='"+txtgram+"'>";

	var quanid="SQuantity"+a;
	var txtquan="txtquan"+a;
	var quan=document.getElementById(quanid).innerHTML;
	document.getElementById(quanid).innerHTML="<input type='text' value='"+quan+"' id='"+txtquan+"'>";

	var costid="MakeCost"+a;
	var txtcost="txtcost"+a;
	var cost=document.getElementById(costid).innerHTML;
	document.getElementById(costid).innerHTML="<input type='text' value='"+cost+"' id='"+txtcost+"'>";

	var sidid="SID"+a;
	var txtsid="txtsid"+a;
	var sid=document.getElementById(sidid).innerHTML;
	document.getElementById(sidid).innerHTML="<input type='text' value='"+sid+"' id='"+txtsid+"'>";

	upid="update"+a;
	document.getElementById(a).style.visibility="hidden";
	document.getElementById(upid).style.visibility="visible";	
}

function update(b)
{
	
	var tojid="txttoj"+b;
	var goldid="txtgold"+b;
	var gramid="txtgram"+b;
	var quanid="txtquan"+b;
	var costid="txtcost"+b;
	var sidid="txtsid"+b;

	
	var toj1=document.getElementById(tojid).value;
	var gold1=document.getElementById(goldid).value;
	var gram1=document.getElementById(gramid).value;
	var quan1=document.getElementById(quanid).value;
	var cost1=document.getElementById(costid).value;
	var sid1=document.getElementById(sidid).value;


	updateVal(b,toj1,gold1,gram1,quan1,cost1,sid1);

	  swal(
			'Updated!',
	    	'Record has been updated.',
    		'success'
	  	)

	document.getElementById(b).style.visibility="visible";
	document.getElementById("update"+b).style.visibility="hidden";

	
	document.getElementById("TOJ"+b).innerHTML=toj1;
	document.getElementById("Gold"+b).innerHTML=gold1;
	document.getElementById("Grams"+b).innerHTML=gram1;
	document.getElementById("SQuantity"+b).innerHTML=quan1;
	document.getElementById("MakeCost"+b).innerHTML=cost1;
	document.getElementById("SID"+b).innerHTML=sid1;

}

function updateVal(id,toj1,gold1,gram1,quan1,cost1,sid1)
{	
	var xml=new XMLHttpRequest();
	xml.open("GET","updatestock.php?jid="+id+"&toj="+toj1+"&gold="+gold1+"&grams="+gram1+"&quan="+quan1+"&cost="+cost1+"&sid="+sid1+"&status=update",false);
	xml.send(null);
	dispdata();	

}

		function delete1(id)
		{
		swal({
			  title: 'Are you sure?',
  				text: "You won't be able to revert this!",
				 type: 'warning',
				  showCancelButton: true,
 				 confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, delete it!'
				}).then(function () {
				  swal(
    				'Deleted!',
				    'Stock has been deleted.',
    				'success'
				  )

		  	var xml=new XMLHttpRequest();
			xml.open("GET","updatestock.php?JID="+id+"&status=delete",false);
			xml.send(null);
			dispdata();

			})
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