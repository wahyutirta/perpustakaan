<?php 
    include 'koneksi.php';
    session_start();
    if ($_SESSION['status']==""){
        header("location:halaman_login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Final Project Perpustakaan [17]</title>
	<link rel="stylesheet" type="text/css" href="CSS/index_superadmin.css">
</head>
<body>
	<nav class="navigasi">
		<div class="wrapper">
			<ul>
				<li><a href="#section1">Home</a></li>
				<li><a href="#section2">Tambah Admin</a></li>
				<li><a href="#section3">Daftar User dan Admin</a></li>
				<li><a href="#section5">Stock Buku</a></li>
				<li><a href="logout.php">Log Out</a></li>
			</ul>
		</div>
	</nav>

    <div id="section1">
        <img src="Gambar/gedung_perpustakaan.jpg">
        <h1>Selamat Datang <b style="color: #DC8239;"><?php echo $_SESSION['name'];?> as <?php echo $_SESSION['status'];?> </b> Di Perpustakaan Bersama</h1>
    </div>
    <hr>
    <div id="section2">
    	<h2 align="center">Tambah Admin</h2>
    	<form method="POST" action="tambah_admin.php">
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
    <hr>
    <div id="section3">
    	<h2 align="center">Daftar User dan Admin</h2>
    	<table align="center">
    		<thead>
    			<tr>
    				<th>Nama</th>
    				<th>Jenis Kelamin</th>
    				<th>No Hp</th>
    				<th>Status</th>
    			</tr>
    		</thead>
    		<tbody>
    			<tr>
    				<?php
    					include "koneksi.php";

    					$query = mysqli_query($conn, "SELECT nama, jenis_kelamin, no_hp, status FROM user WHERE status IN ('Admin','User')") or die(mysqli_error($conn));
    					if (mysqli_num_rows($query) > 0) {
    					 	while ($rows = mysqli_fetch_assoc($query)) {
    					 		$nama = $rows['nama'];
		                        $jk = $rows['jenis_kelamin'];
		                        $no_hp = $rows['no_hp'];
		                        $status = $rows['status'];?>

    					 	<tr>
    					 		<td><?php echo $nama; ?></td>
    					 		<td><?php echo $jk; ?></td>
    					 		<td><?php echo $no_hp; ?></td>
    					 		<td><?php echo $status; ?></td>
    					 	</tr>
    					<?php  } } else { ?>
    					<tr>
    						<td colspan="4" align="center">Tidak Ada Data Ditemukan</td>
    					</tr>
    					<?php } ?>
    			</tr>
    		</tbody>
    	</table>
    </div>
    <hr>
    <div id="section5">
    	<h2>Daftar Stock Buku</h2>
    	<table align="center">
    		<thead>
    			<tr>
    				<th>Id Buku</th>
    				<th>Judul Buku</th>
    				<th>Pengarang</th>
    				<th>Penerbit</th>
    				<th>Stock Buku</th>
    			</tr>
    		</thead>
    		<tbody>
    			<tr>
    				<?php
    					include "koneksi.php";

    					$query = mysqli_query($conn, "SELECT id_buku, judul_buku, pengarang_buku, penerbit, stock_buku FROM buku") or die(mysqli_error($conn));
    					if (mysqli_num_rows($query) > 0) {
    					 	while ($rows = mysqli_fetch_assoc($query)) {
    					 		$id = $rows['id_buku'];
		                        $judul = $rows['judul_buku'];
		                        $pengarang = $rows['pengarang_buku'];
		                        $penerbit = $rows['penerbit'];
		                        $stock = $rows['stock_buku']?>

    					 	<tr>
    					 		<td align="center"><?php echo $id; ?></td>
    					 		<td><?php echo $judul; ?></td>
    					 		<td><?php echo $pengarang; ?></td>
    					 		<td><?php echo $penerbit; ?></td>
    					 		<td align="center"><?php echo $stock; ?></td>
    					 	</tr>
    					<?php  } } else { ?>
    					<tr>
    						<td colspan="4" align="center">Tidak Ada Data Ditemukan</td>
    					</tr>
    					<?php } ?>
    			</tr>
    		</tbody>
    	</table>
    </div>
    <footer>
        <p>&copy Copyright 2020</p>  
        <p>Perpustakaan Bersama, Bali</p>
    </footer>
</body>
</html>