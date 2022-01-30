<!DOCTYPE HTML>
<html>
	<head> 	
	<title>Delete or Edit Supplier Details - Kalpesh Jewellery Shop</title>
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
		<li><a href="supdisp.php" accesskey="s">Display</a></li>
		<li><a href="supdel.php" accesskey="r">Delete</a></li>
		<li><a href="supadd.php" accesskey="a"> Add </a></li>
		<li><a href="adminlogin.php" accesskey="h"> Home</a></li>
		</ul></center>
	</div>
	<div class="imglog" role="main">
		<div class="employee" style="width: 88%;"><center class="formtitle"><h2><span>D</span>elete Or Edit Supplier Details</h2><center><br>
			<div id="details" class="details" style="overflow: scroll; width: 850px; height: 550px;">
			<center class="det" style="font-weight: bold;">Supplier details</center><br>
			</div>
	</div>
	</div>

		<script type="text/javascript">
	
		dispdata();
		function dispdata()
		{
			var xml=new XMLHttpRequest();
			xml.open("GET","updatesup.php?status=disp",false);
			xml.send(null);
			document.getElementById("details").innerHTML=xml.responseText;
		}

function edit(a)
{
	var nameid="SName"+a;
	var txtname="txtname"+a;
	var name=document.getElementById(nameid).innerHTML;
	document.getElementById(nameid).innerHTML="<input type='text' value='"+name+"' id='"+txtname+"'>";

	var addrid="SAddr"+a;
	var txtaddr="txtaddr"+a;
	var addr=document.getElementById(addrid).innerHTML;
	document.getElementById(addrid).innerHTML="<input type='text' value='"+addr+"' id='"+txtaddr+"'>";

	var contid="SCont"+a;
	var txtcont="txtcont"+a;
	var cont=document.getElementById(contid).innerHTML;
	document.getElementById(contid).innerHTML="<input type='text' value='"+cont+"' id='"+txtcont+"'>";

	var compid="Company"+a;
	var txtcomp="txtcomp"+a;
	var comp=document.getElementById(compid).innerHTML;
	document.getElementById(compid).innerHTML="<input type='text' value='"+comp+"' id='"+txtcomp+"'>";

	var codeid="Compcode"+a;
	var txtcode="txtcode"+a;
	var code=document.getElementById(codeid).innerHTML;
	document.getElementById(codeid).innerHTML="<input type='text' value='"+code+"' id='"+txtcode+"'>";

	
	upid="update"+a;
	document.getElementById(a).style.visibility="hidden";
	document.getElementById(upid).style.visibility="visible";	
}

function update(b)
{
	var nameid="txtname"+b;
	var addrid="txtaddr"+b;
	var contid="txtcont"+b;
	var compid="txtcomp"+b;
	var codeid="txtcode"+b;
	

	var name1=document.getElementById(nameid).value;
	var addr1=document.getElementById(addrid).value;
	var cont1=document.getElementById(contid).value;
	var comp1=document.getElementById(compid).value;
	var code1=document.getElementById(codeid).value;
	

	updateVal(b,name1,addr1,cont1,comp1,code1);

	  swal(
			'Updated!',
	    	'Record has been updated.',
    		'success'
	  	)

	document.getElementById(b).style.visibility="visible";
	document.getElementById("update"+b).style.visibility="hidden";

	document.getElementById("SName"+b).innerHTML=name1;
	document.getElementById("SAddr"+b).innerHTML=addr1;
	document.getElementById("SCont"+b).innerHTML=cont1;
	document.getElementById("Company"+b).innerHTML=comp1;
	document.getElementById("Compcode"+b).innerHTML=code1;
	

}

function updateVal(id,name1,addr1,cont1,comp1,code1)
{	
	var xml=new XMLHttpRequest();
	xml.open("GET","updatesup.php?sid="+id+"&sname="+name1+"&scont="+cont1+"&comp="+comp1+"&code="+code1+"&saddr="+addr1+"&status=update",false);
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
				    'Supplier record has been deleted.',
    				'success'
				  )
				
		  	var xml=new XMLHttpRequest();
			xml.open("GET","updatesup.php?SID="+id+"&status=delete",false);
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