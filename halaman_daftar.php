<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Final Project Perpustakaan - Halaman Daftar [17]</title>
	<link rel="stylesheet" type="text/css" href="CSS/halaman_daftar.css">
</head>
<body>
	<nav class="header">
		<ul>
			<li><a href="halaman_login.php">Login</a></li>
			<li><a href="halaman_daftar.php">Daftar</a></li>
		</ul>
	</nav>
	<h1>Selamat Datang Di Perpustakaan Bersama</h1>
	<div id="daftar_box">
		<h2>DAFTAR</h2>
		<form method="POST" action="daftar.php">
			<input type="text" name="nama" placeholder="Nama">
            <input type="radio" name="jk" value="Laki-Laki">Laki-Laki
            <input type="radio" name="jk" value="Perempuan">Perempuan
			<input type="text" name="no_hp" placeholder="Nomor Hp/Telp"></td>
            <textarea name="alamat" placeholder="Alamat"></textarea></td>
            <input type="text" name="user" placeholder="Username"></td>
            <input type="password" name="pass" placeholder="Password"></td>
			<input type="submit" name="daftar" value="Daftar"></td>
		</form>
	</div>
	<footer>
		<p>&copy Copyright 2020</p>  
        <p>Perpustakaan Bersama, Bali</p>
	</footer>
</body>
</html>