<?php 
session_start();
if (empty($_SESSION['username'])) {
    header("location:masuk.php?pesanGagal=belumLogin");
}

include "BE_database.php";
$id = $_GET['idPengaduan'];
$halaman = $_GET['halaman'];
if($halaman == 1){
    $hal = "daftarEnkripsi.php";
}else{
    $hal = "daftarDeskripsi.php";
}
$query = mysqli_query($konek, "DELETE FROM data_pengaduan where id_pengaduan=$id");
if ($query) {
    header("location:".$hal."?pesanBerhasil=hapusBerhasil");
} else {
    header("location:".$hal."?pesanGagal=hapusGagal");
}
?>