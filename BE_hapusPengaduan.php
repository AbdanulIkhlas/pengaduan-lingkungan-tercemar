<?php 
session_start();
if (empty($_SESSION['username'])) {
    header("location:masuk.php?pesan=belumLogin");
}

include "database.php";
$id = $_GET['idPengaduan'];
$halaman = $_GET['halaman'];
$halaman == 1 ? "daftarEnkripsi.php" : "daftarDeskripsi.php";
$query = mysqli_query($konek, "DELETE FROM data_pengaduan where id=$id");
if ($query) {
    header("location:".$halaman."?pesan=hapusBerhasil");
} else {
    header("location:".$halaman."?pesan=hapusGagal");
}
?>