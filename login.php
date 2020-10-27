<?php  
	include "koneksi.php";
	session_start();
	if( isset($_SESSION['status'])) {
	    header("Location:index.php");
	    exit;
	}
	$username = $_POST['username'];
	$password = $_POST['pass'];
	
	$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";

	$konek = mysqli_query($conn, $query);
	$login = mysqli_num_rows($konek);

	if ($login > 0) {
		$data = mysqli_fetch_assoc($konek);
		if ($data['status']=="user") {
			$_SESSION['id_user'] = $data['id_user'];
			$_SESSION['name'] = $data['nama'];
			$_SESSION['username'] = $data['username'];
			$_SESSION['status'] = $data['status'];
			header("location:index.php");
		}else if($data['status']=="admin"){
			$_SESSION['id_user'] = $data['id_user'];
			$_SESSION['name'] = $data['nama'];
			$_SESSION['status'] = $data['status'];
			header("location:index_admin.php");
		}else if ($data['status']=="superadmin") {
			$_SESSION['id_user'] = $data['id_user'];
			$_SESSION['name'] = $data['nama'];
			$_SESSION['status'] = $data['status'];
			header("location:index_superadmin.php");
		}else{
			header("location:halaman_login.php");
		}
	}else{
		header("location:halaman_login.php?pesan=gagal_login");
	}
?>