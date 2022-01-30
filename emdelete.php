<!DOCTYPE HTML>
<html>
	<head> 	
	<title>Edit Or Delete Employee - Kalpesh Jewellery Shop</title>
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
		<li><a href="emdisplay.php" accesskey="s">Display</a></li>	
		<li><a href="emdelete.php" accesskey="r">Delete</a></li>
		<li><a href="empadd.php" accesskey="a"> Add </a></li>
		<li><a href="adminlogin.php" accesskey="h"> Home</a></li>
		</ul></center>
	</div>
	<div class="imglog" role="main">
		<div class="employee" style="width: 88%;"><center class="formtitle"><h2><span>D</span>elete or Edit Employee Details</h2><center><br>
			<div id="details" class="details" style="overflow: scroll; width: 850px; height: 550px;">
			<center class="det" style="font-weight: bold;">Employee details</center><br>
			</div>
	</div>
	</div>

		<script type="text/javascript">
	
		dispdata();
		function dispdata()
		{
			var xml=new XMLHttpRequest();
			xml.open("GET","update.php?status=disp",false);
			xml.send(null);
			document.getElementById("details").innerHTML=xml.responseText;
		}

function edit(a)
{
	var nameid="EName"+a;
	var txtname="txtname"+a;
	var name=document.getElementById(nameid).innerHTML;
	document.getElementById(nameid).innerHTML="<input type='text' value='"+name+"' id='"+txtname+"'>";

	var addrid="EAddr"+a;
	var txtaddr="txtaddr"+a;
	var addr=document.getElementById(addrid).innerHTML;
	document.getElementById(addrid).innerHTML="<input type='text' value='"+addr+"' id='"+txtaddr+"'>";

	var contid="ECont"+a;
	var txtcont="txtcont"+a;
	var cont=document.getElementById(contid).innerHTML;
	document.getElementById(contid).innerHTML="<input type='text' value='"+cont+"' id='"+txtcont+"'>";

	var secid="Section"+a;
	var txtsec="txtsec"+a;
	var sec=document.getElementById(secid).innerHTML;
	document.getElementById(secid).innerHTML="<input type='text' value='"+sec+"' id='"+txtsec+"'>";

	var shiftid="Shift"+a;
	var txtshift="txtshift"+a;
	var shift=document.getElementById(shiftid).innerHTML;
	document.getElementById(shiftid).innerHTML="<input type='text' value='"+shift+"' id='"+txtshift+"'>";

	var gidid="EGID"+a;
	var txtgid="txtgid"+a;
	var gid=document.getElementById(gidid).innerHTML;
	document.getElementById(gidid).innerHTML="<input type='text' value='"+gid+"' id='"+txtgid+"'>";

	var salid="Salary"+a;
	var txtsal="txtsal"+a;
	var sal=document.getElementById(salid).innerHTML;
	document.getElementById(salid).innerHTML="<input type='text' value='"+sal+"' id='"+txtsal+"'>";

	upid="update"+a;
	document.getElementById(a).style.visibility="hidden";
	document.getElementById(upid).style.visibility="visible";	
}

function update(b)
{
	var nameid="txtname"+b;
	var addrid="txtaddr"+b;
	var contid="txtcont"+b;
	var secid="txtsec"+b;
	var gidid="txtgid"+b;
	var salid="txtsal"+b;
	var shiftid="txtshift"+b;

	var name1=document.getElementById(nameid).value;
	var addr1=document.getElementById(addrid).value;
	var cont1=document.getElementById(contid).value;
	var sec1=document.getElementById(secid).value;
	var gid1=document.getElementById(gidid).value;
	var sal1=document.getElementById(salid).value;
	var shift1=document.getElementById(shiftid).value;


	updateVal(b,name1,addr1,cont1,sec1,gid1,sal1,shift1);

	  swal(
			'Updated!',
	    	'Record has been updated.',
    		'success'
	  	)

	document.getElementById(b).style.visibility="visible";
	document.getElementById("update"+b).style.visibility="hidden";

	document.getElementById("EName"+b).innerHTML=name1;
	document.getElementById("EAddr"+b).innerHTML=addr1;
	document.getElementById("ECont"+b).innerHTML=cont1;
	document.getElementById("Section"+b).innerHTML=sec1;
	document.getElementById("EGID"+b).innerHTML=gid1;
	document.getElementById("Salary"+b).innerHTML=sal1;
	document.getElementById("Shift"+b).innerHTML=shift1;

}

function updateVal(id,name1,addr1,cont1,sec1,gid1,sal1,shift1)
{	
	var xml=new XMLHttpRequest();
	xml.open("GET","update.php?eid="+id+"&ename="+name1+"&cont="+cont1+"&sec="+sec1+"&gid="+gid1+"&shift="+shift1+"&eaddr="+addr1+"&sal="+sal1+"&status=update",false);
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
				    'Employee record has been deleted.',
    				'success'
				  )

		  	var xml=new XMLHttpRequest();
			xml.open("GET","update.php?EID="+id+"&status=delete",false);
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