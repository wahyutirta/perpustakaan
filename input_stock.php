<?php  
	include "koneksi.php";
    session_start();
    if ($_SESSION['status']==""){
        header("location:halaman_login.php");
    }
	$id_buku = $_POST['id_buku'];
	$jml_buku = $_POST['jml_buku'];

	$query = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id_buku'");
	$stock = mysqli_fetch_array($query);
	$stok = $stock['stock_buku'];

	$stock_baru = $stok+$jml_buku;

	$sql = mysqli_query($conn, "UPDATE buku SET stock_buku='$stock_baru' WHERE id_buku='$id_buku'");

	if($sql){
		echo '<script>alert("Data Berhasil Disimpan");window.location="index_admin.php";</script>';
	}
	else{
		echo '<script>alert("Data Gagal Disimpan");window.location="index_admin.php";</script>';
	}
?>