<?php
include("php/firstpagephp.php");
?>
<!DOCTYPE HTML>
<html>
	<head> 	
	<title>Login - Kalpesh Jewellery Shop </title>
	<link rel="stylesheet" type="text/css" href="cssfolder/firstpage.css">

	<script src="bower_components/sweetalert/dist/sweetalert.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="cssfolder/sweetalert2.css">

  	<style type="text/css">
  		
  		input[type=text]{
  			border:2px solid #aaa;
  			border-radius: 4px;
  			padding: 7px;
  			box-sizing: border-box;;
  		}
  		input[type=text]:focus{
  			border-color: dodgerBlue;
  			box-shadow: 0 0 8px 0 dodgerBlue;
  		}

  		input[type=password]{
  			border:2px solid #aaa;
  			border-radius: 4px;
  			padding: 7px;
  			box-sizing: border-box;;
  		}
  		input[type=password]:focus{
  			border-color: dodgerBlue;
  			box-shadow: 0 0 8px 0 dodgerBlue;
  		}
		.btn{
			background-color: maroon;
			color:white;
			font-weight: 550px;
		}
		.btn:hover{
			background-color : black;
			color: darkgrey; 
		}
		#admin{ background-image: url('images/ss3.jpg')}

  	</style>

	</head>

	<body>
		<img src="images/heart.jpg" width="100%" height="30%" class="header" style="margin-bottom: 10px; margin-left: 127px;">
	<div class="nav">
		<center><ul><li><a href="firstpage.php">Home </a></li>
		</ul></center>
	</div>
	<div class="imglog">
	<div class="images" style="border-radius: 50px;">
	

		<div class="slideshow-container" style="margin-left: 45px;">

			<div class="mySlides fade">
  			<img src="images/ss1.jpg" style="width:90%; height:80%">
			</div>

			<div class="mySlides fade">
 			<img src="images/ss3.jpg" style="width:90%; height:80%">
			</div>

			<div class="mySlides fade">
 			<img src="images/ss7.jpg" style="width:90%; height:80%">
			</div>

			<div class="mySlides fade">
 			<img src="images/ss8.jpg" style="width:90%; height:80%">
			</div>

			<div class="mySlides fade">
 			<img src="images/ss2.jpg" style="width:90%; height:80%">
			</div>

			<br>

		<div style="text-align:center">
  			<span class="dot"></span> 
  			<span class="dot"></span> 
 			 <span class="dot"></span> 
 			 <span class="dot"></span> 
 			 <span class="dot"></span> 
		</div>
			<script>
			var slideIndex = 0;
			showSlides();

			function showSlides() {
    			var i;
   			 var slides = document.getElementsByClassName("mySlides");
    			var dots = document.getElementsByClassName("dot");
    			for (i = 0; i < slides.length; i++) {
       			slides[i].style.display = "none";  
    			}
   			 slideIndex++;
   			 if (slideIndex > slides.length) {slideIndex = 1}    
    			for (i = 0; i < dots.length; i++) {
        			dots[i].className = dots[i].className.replace(" active", "");
    			}
    			slides[slideIndex-1].style.display = "block";  
    			dots[slideIndex-1].className += " active";
    			setTimeout(showSlides, 2000); // Change image every 2 seconds
			}
			</script>

		</div>
	

	</div>

	<div class="login" style="border-radius:25px;">
	<div class="admin" id="admin" style="height: 70%; margin-top: 50px; border-radius: 15px 80px;"><center class="formtitle"><h2><span>L</span>ogin</h2></center><br>
		<form role="form" action="" method="post" name="myform">
		<table style="margin-left: 27px;">
		<tr>
			<td style="font-size: 18px; font-family: Verdana;"><label for="id">Enter user ID:</label></td></tr><tr><td><input type="text" id="id" name="id" placeholder="User ID" required style="width: 280px; height: 40px; font-size: 16px; font-family: Verdana;"></td>
		<tr>
		<tr>
			<td style="font-size: 18px; font-family: Verdana;"><label for="pass">Enter password:</label></td></tr><tr><td style="font-size: 18px; font-family: Verdana;"><input type="password" id="pass" name="pass" placeholder="Password" required style="width: 280px; height: 40px; font-size: 16px; font-family: Verdana;"></td>
		</tr>
		<tr>	
			<td><br><input type="submit" id="submit" class="btn" name="submit" value="Login" style="width: 280px; height: 40px; font-size: 16px; font-family: Verdana;"></td>
		</tr>
		</table>
		</form>
	</div>		
	</div>
	</div>
	
<script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous">
</script>

 <script type="text/javascript" src="js/sweetalert2.js"></script>


	
	</body>
</html>