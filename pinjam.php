<?php 
	include 'koneksi.php';
	session_start();
	
	if ($_SESSION['status']==""){
		header("location:halaman_login.php");
	}
	include 'koneksi.php';

	$id_user = $_POST['id_user'];
	$id_buku = $_POST['id_buku'];
	$tgl_pinjam = $_POST['tgl_pinjam'];
	$tgl_kembali = $_POST['tgl_kembali'];

	$form = mysqli_query($conn, "INSERT INTO pinjam_buku (id_user,id_buku,tgl_pinjam,tgl_kembali,status_pinjam) VALUES ('".$id_user."','".$id_buku."','".$tgl_pinjam."','".$tgl_kembali."',0)") or die(mysqli_error($conn));

	if($form){
		echo '<script>alert("Data Berhasil Disimpan");window.location="index.php";</script>';
	}
	else{
		echo '<script>alert("Data Gagal Disimpan");window.location="index.php";</script>';
	}	
?>