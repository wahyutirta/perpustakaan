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
	<link rel="stylesheet" type="text/css" href="CSS/index.css">
</head>
<body>
	<nav class="navigasi">
        <ul>
            <li><a href="#section1">Home</a></li>
            <li><a href="#section2">Galeri Buku</a></li>
            <li><a href="#section3">Tentang</a></li>
            <li><a href="#section4">Form Pinjam Buku</a></li>
            <li><a href="#section5">Edit Profile</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </nav>

    <div id="section1">
        <img src="Gambar/gedung_perpustakaan.jpg">
        <h1>Selamat Datang <b style="color: #DC8239;"><?php echo $_SESSION['name'];?> as <?php echo $_SESSION['status'];?> </b> Di Perpustakaan Bersama</h1>
    </div>

    <hr>

    <div id="section2">
        <h2>Galeri Buku</h2>
        <?php 
            $s_penerbit="";
            $s_keyword="";
            $sort = 'ASC';
            $newsort = 'ASC';
            if (isset($_GET['search'])) {
                $s_penerbit = $_GET['s_penerbit'];
                $s_keyword = $_GET['s_keyword'];
            }
            if (isset($_GET['order'])) {
                $order = $_GET['order'];
                $sort = $_GET['sort'];
                
                if ($sort == 'DESC') {
                    $newsort = 'ASC';
                }
                else{
                    $newsort = 'DESC';
                }
            }else{
                $order = 'id_buku';
            }
        ?>
        <form method="GET" action="" align="center">
        <h4>Cari</h4>
        <select name="s_penerbit" id="s_penerbit">
            <option value="">Filter Penerbit</option>
            <option value="Elex Media Computindo"
            <?php 
                if ($s_penerbit=="Elex Media Computindo") {
                    echo "selected";
                }
            ?>>Elex Media Computindo</option>
            <option value="Andi Offset" 
            <?php 
                if ($s_penerbit=="Andi Offset") {
                    echo "selected";
                }
            ?>>Andi Offset</option>
            <option value="Informatika Bandung" 
            <?php 
                if ($s_penerbit=="Informatika Bandung") {
                    echo "selected";
                }
            ?>>Informatika Bandung</option>
            <option value="Bsi Press" 
            <?php 
                if ($s_penerbit=="Bsi Press") {
                    echo "selected";
                }
            ?>>Bsi Press</option>
            <option value="Prestasi Pustaka" 
            <?php 
                if ($s_penerbit=="Prestasi Pustaka") {
                    echo "selected";
                }
            ?>>Prestasi Pustaka</option>
            <option value="Gava Media" 
            <?php 
                if ($s_penerbit=="Gava Media") {
                    echo "selected";
                }
            ?>>Gava Media</option>
        </select>

        <input type="text" name="s_keyword" placeholder="Keyword..." id="s_keyword" value="<?php echo $s_keyword; ?>">

        <button id="search" name="search">Cari</button>
    </form>
    <table align="center" cellpadding="20">
        <thead>
            <tr>
                <th>Id Buku</th>
                <th><a href="?order=judul_buku&&sort=<?php echo $newsort; ?>">Judul Buku</a></th>
                <th><a href="?order=pengarang_buku&&sort=<?php echo $newsort; ?>">Pengarang</a></th>
                <th><a href="?order=edisi_buku&&sort=<?php echo $newsort; ?>">Edisi</a></th>
                <th><a href="?order=penerbit&&sort=<?php echo $newsort; ?>">Penerbit</a></th>
                <th><a href="?order=tahun_terbit&&sort=<?php echo $newsort; ?>">Tahun</a></th>
                <th><a href="?order=no_rak&&sort=<?php echo $newsort; ?>">No. Rak</a></th>
                <th><a href="?order=stock_buku&&sort=<?php echo $newsort; ?>">Stock</a></th>
            </tr>       
        </thead>
        <tbody>
            <?php
                include "koneksi.php";
                $search_penerbit = '%'.$s_penerbit.'%';
                $search_keyword = '%'.$s_keyword.'%';

                $query = "SELECT * FROM buku WHERE penerbit LIKE ? AND (judul_buku LIKE ? OR pengarang_buku LIKE ? OR edisi_buku LIKE ? OR tahun_terbit LIKE ? OR no_rak LIKE ? OR stock_buku LIKE ?) ORDER BY $order $sort";

                $buku1 = mysqli_prepare($conn, $query) or die(mysqli_error($conn));
                mysqli_stmt_bind_param($buku1, "sssssss", $search_penerbit, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword);
                mysqli_stmt_execute($buku1);
                $hasil = mysqli_stmt_get_result($buku1);

                $kolom = 3;    
                $i=1;
                if (mysqli_num_rows($hasil) > 0) {
                    while ($rows = mysqli_fetch_assoc($hasil)) {
                        $id_buku = $rows['id_buku'];
                        $judul_buku = $rows['judul_buku'];
                        $pengarang_buku = $rows['pengarang_buku'];
                        $edisi_buku = $rows['edisi_buku'];
                        $penerbit = $rows['penerbit'];
                        $tahun_terbit = $rows['tahun_terbit'];
                        $no_rak = $rows['no_rak'];
                        $stock_buku = $rows['stock_buku']; 
            ?>
                <tr>
                    <td><?php echo $id_buku; ?></td>
                    <td><?php echo $judul_buku; ?></td>
                    <td><?php echo $pengarang_buku; ?></td>
                    <td><?php echo $edisi_buku; ?></td>
                    <td><?php echo $penerbit; ?></td>
                    <td><?php echo $tahun_terbit; ?></td>
                    <td><?php echo $no_rak; ?></td>
                    <td><?php echo $stock_buku; ?></td>
                </tr>
                <?php } } else { ?>
                <tr>
                    <td colspan="9" align="center">Tidak Ada Data Ditemukan</td>
                </tr>
                <?php } ?>
        </tbody>
    </table>
    </div>
    
    <hr>

    <div id="section3">
        <h2>Perpustakaan Bersama</h2>
        <center>
        <p> Perpustakaan ini menyediakan buku-buku dari berbagai jenis dan genre. 
        Pembaca dari berbagai kalangan dapat dengan nyaman membaca di perpustakaan ini. 
        Pembaca dapat membaca buku secara langsung di perpustakaan atapun meminjamnya. 
        Pembaca dapat meminjaman buku paling lama 2 minggu dan dikenakan sanksi berupa denda sesuai perjanjian. 
        Itulah sekilas tentang Perpustakaan Ini. Selamat Membaca.</p>
        </center>
    </div>
    
    <hr>
    <div id="section4">
       <h2 align="center">Form Pinjam Buku</h2>
       <form method="POST" action="pinjam.php">
            <label>Nama Peminjam</label><br>
            <input type="hidden" id="id_user" name="id_user" value="<?php echo $_SESSION['id_user'];?>">
            <input type="text" id="nama_pinjam" name="nama_pinjam" value="<?php echo $_SESSION['username'];?>"readonly><br>
            <label>Id Buku</label><br>
            <input type="text" id="id_buku" name="id_buku" placeholder="Id Buku"></td><br>
            <label>Tanggal Pinjam</label><br>
            <input type="date" id="tgl_pinjam" name="tgl_pinjam"></td><br>
            <label>Tanggal Kembali</label><br>
            <input type="date" id="tgl_kembali" name="tgl_kembali"></td><br>
            <input type="submit" id="pinjam" name="pinjam" value="Submit"></td><br>
       </form>
    </div>
    <hr>
    <div id="section5">
        <h2>Edit Profile</h2>
        <form method="POST" action="edit_profil.php">
            <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'];?>"readonly>
            <input type="text" name="nama" value="<?php echo $_SESSION['name'];?>">
            <input type="radio" name="jk" value="Laki-Laki">Laki-Laki
            <input type="radio" name="jk" value="Perempuan">Perempuan
            <input type="text" name="no_hp" placeholder="Nomor Hp/Telp"></td>
            <textarea name="alamat" placeholder="Alamat"></textarea></td>
            <input type="text" name="user" placeholder="Username"></td>
            <input type="password" name="pass" placeholder="Password"></td>
            <input type="submit" name="simpan" value="Simpan"></td>
        </form>
    </div>
    <footer>
        <p>&copy Copyright 2020</p>  
        <p>Perpustakaan Bersama, Bali</p>
    </footer>
</body>
</html>