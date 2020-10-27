<?php 
	session_start();
	session_destroy();
	header("location:halaman_login.php");
?>