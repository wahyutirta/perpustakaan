<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Final Project Perpustakaan - Halaman Login[17]</title>
	<link rel="stylesheet" type="text/css" href="CSS/halaman_login.css">
</head>
<body>
	<div class="container">
		<?php 
			include "koneksi.php";
			if( isset($_SESSION['status'])) {
				header("Location:index.php");
				exit;
			}
			if (isset($_GET['pesan'])) {
				if ($_GET['pesan']=="gagal_login") {
					echo "<script type='text/javascript'>alert('Username dan Password Salah!');</script>";
				}
			}
		?>
		<nav class="header">
			<ul>
				<li><a href="halaman_login.php">Login</a></li>
				<li><a href="halaman_daftar.php">Daftar</a></li>
			</ul>
		</nav>
		<div class="content">
		<h1>Selamat Datang Di Perpustakaan Bersama</h1>
		<div id="login_box">
			<h2>LOG IN</h2>
			<form method="POST" action="login.php">
				<label>Username</label><br>
				<input type="text" name="username" placeholder="Username"><br>
				<label>Password</label><br>
				<input type="password" name="pass" placeholder="Password"><br>
				<input type="submit" name="masuk" value="Login">
			</form>
		</div>
		</div>
		<footer>
			<p>&copy Copyright 2020</p>  
			<p>Perpustakaan Bersama, Bali</p>
		</footer>
	</div>
</body>
</html>