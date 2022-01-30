<?php
session_start();
echo"<script type='text/javascript'>";
echo"alert('loged out successfully');";
echo"</script>";
session_destroy();
header('location:firstpage.php');
?>