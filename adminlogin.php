<?php
session_start();
if($_SESSION["user"]==true)
{
//echo $_SESSION["user"];
}
else
{
  header('location:firstpage.php');
}
?>

<!DOCTYPE html>
<html>

<head>
<title>Home - Kalpesh Jewellery shop </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body 
{
	background-image: url("images/back1.jpg");
    	background-repeat: no-repeat;
    	background-attachment: fixed;
    	background-position: center; 
}

.header 
{
	width:80%;
	height:30%;
	margin-top:20px;
	margin-right:auto;
	margin-left:auto;
	margin-bottom:-8px;
}

.imglog
{
	position:absolute;
	width:79%;
	height:90%;
	margin-bottom: 20px;
	margin-top:10px;
	margin-left:10%;
	padding: 10px;
	margin-bottom:20px;
 	background: rgba(0,0,0, 0.6);
}


.container {    
	width:80%;
	background-color:maroon;
	padding-right: 15px;
	margin-bottom: -10px;
	margin-right:auto;
	margin-left:auto;
	align-text:right;
	overflow:auto;	
	position:relative
 	box-shadow:0 0 5px;
 	-webkit-box-shadow:5px 5px 5px;
	text-align:right;
}

.container a {
    	float: left;
    	font-size: 18px;
    	color: white;
    	text-align: center;
	padding: 15px;
    	text-decoration: none;
}

.dropdown {
    	float: left;
    	overflow: hidden;
	padding-left: 25px;
}

.dropdown .dropbtn {
    	font-size: 18px;    
    	border: none;
    	outline: none;
    	color: white;
    	padding: 15px;
    	background-color: inherit;
}

.container a:hover, .dropdown:hover .dropbtn {
    	background-color: black;
	color: grey;
}

.dropdown-content {
    	display: none;
    	position: absolute;
    	background-color: maroon;
    	min-width: 160px;
    	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    	z-index: 1;
}

.dropdown-content a {
    	float: none;
    	color: white;
	    font-size: 16px;
    	padding: 12px 16px;
    	text-decoration: none;
    	display: block;
    	text-align: middle;
      border: 1px solid black;

}

.dropdown-content a:hover {
    	background-color: black;
      color: darkgrey;
}

.dropdown:hover .dropdown-content {
    display: block;
}

* {box-sizing:border-box}
body {font-family: Verdana,sans-serif;}
.mySlides {display:none}
	
/* Slideshow container */
.slideshow-container {
  max-width: 850px;
  max-height: 500 px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 13px;
  width: 13px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>
</head>

<body>
<div class="header">
	<img src="images/heart.jpg" width="100%" height="30%">
</div>		
<br>
<div class="container" role="navigation">
 <div style='float:right;'>
	<a href="logout.php">LOGOUT</a>
  </div>
 <div style='float:right;'>
	<a href="transactions.php">TRANSACTIONS</a>
  </div>  
  <div class="dropdown" style="float:right;">
    <button id="stock" class="dropbtn" aria-expanded="false" onclick="changeOnClick(this.id)">STOCK</button> 
    <div class="dropdown-content">
      <a href="stockadd.php">Add</a>
       <a href="stockup.php">Update</a>
        <a href="stockdisp.php">Display</a>
         <a href="baseup.php">Base</a>
    </div>
  </div> 


  <div class="dropdown" style="float:right;">
    <button id="supplier" class="dropbtn" aria-expanded="false" onclick="changeOnClick(this.id)">SUPPLIER</button>
    <div class="dropdown-content">
      <a href="supadd.php">Add</a>
      <a href="supdel.php">Delete</a>
      <a href="supdisp.php">Display</a>
      
    </div>
  </div> 

  <div class="dropdown" style="float:right;">
    <button id="employee" class="dropbtn" aria-expanded="false" onclick="changeOnClick(this.id)">EMPLOYEE</button>
    <div class="dropdown-content">
      <a href="empadd.php">Add</a>
      <a href="emdelete.php">Delete</a>
      <a href="emdisplay.php">Display</a>
      <a href="resetpassword.php">Reset Password</a>
    </div>
  </div> 
  <div style="float: right;">
	<a href="adminlogin.php">HOME</a>
  </div>

</div>
<br>

<div class="imglog">
<div class="slideshow-container">

<div class="mySlides fade">
  <img src="images/j1.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="images/j2.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="images/1.jpg" style="width:100%">
</div>
<div class="mySlides fade">
  <img src="images/j3.jpg" style="width:100%">
</div>
<div class="mySlides fade">
  <img src="images/j4.jpg" style="width:100%">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
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

function changeOnClick(a) {
//alert("hi " + a + " " + document.getElementById(a).getAttribute("aria-expanded"));
if(document.getElementById(a).getAttribute("aria-expanded") == "false") {
//alert(2);
document.getElementById(a).setAttribute("aria-expanded", "true");
document.getElementById(a).nextElementSibling.style.display = "block";
}
else {
document.getElementById(a).setAttribute("aria-expanded", "false");
document.getElementById(a).nextElementSibling.style.display = "none";
}
}

</script>

</body>
</html> 
