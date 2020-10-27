<?php
include 'koneksi.php';
session_start();

if ($_SESSION['status']==""){
    header("location:halaman_login.php");
}
if(isset($_POST['tambah'])){

    $form = mysqli_query($conn, "INSERT INTO buku VALUES
    (NULL,  
        '".$judul=$_POST['judul_buku']."',
        '".$pengarang=$_POST['pengarang_buku']."',
        '".$edisi=$_POST['edisi_buku']."',
        '".$penerbit=$_POST['penerbit']."',
        '".$tahun=$_POST['tahun_terbit']."',
        '".$no_rak=$_POST['no_rak']."',
        '".$stock=$_POST['stock_buku']."')");
    if($form){
      echo '<script>alert("Data Berhasil Disimpan");window.location="index_superadmin.php";</script>';
    }
    else{
     echo '<script>alert("Data Gagal Disimpan");window.location="index_superadmin.php";</script>';
    } 
  }
?>