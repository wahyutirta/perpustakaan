<?php 
	if(isset($_POST['daftar'])){
		include 'koneksi.php';
		$form = mysqli_query($conn, "INSERT INTO user VALUES
		(NULL, 	'".$nama=$_POST['nama']."',
				'".$jk=$_POST['jk']."',
				'".$no_hp=$_POST['no_hp']."',
				'".$alamat=$_POST['alamat']."',
				'".$username=$_POST['user']."',
				'".$pass=$_POST['pass']."',
				'".$status="user"."')");
		if($form){
			echo '<script>alert("Data Berhasil Disimpan");window.location="halaman_login.php";</script>';
		}
		else{
			echo 'Gagal Daftar';
		}	
	}
?>