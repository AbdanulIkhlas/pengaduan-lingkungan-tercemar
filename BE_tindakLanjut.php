<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:masuk.php?pesan=belumLogin");
}

include "BE_database.php";
$idUser = $_GET['idUser'];
$id_pengaduan = $_GET['idPengaduan'];
$pesanTindakLanjut = "Terima kasih atas pengaduannya. Kami akan menindaklanjuti semaksimal mungkin";
$belumDibaca = 0;
$halaman = $_GET['halaman'];

$query = mysqli_query($konek, "INSERT INTO notifikasi VALUES
    ('','$idUser','$id_pengaduan','$pesanTindakLanjut','$belumDibaca')
    ") or die(mysqli_error($konek));


    

if($halaman == 1){
    $hal = "daftarEnkripsi.php";
}else{
    $hal = "daftarDeskripsi.php";
}

if ($query) {
    $queryUpdate = mysqli_query($konek, "UPDATE data_pengaduan SET tindak_lanjut = '1' WHERE id_pengaduan = $id_pengaduan")
    or die(mysqli_error($konek));
    if($queryUpdate){
        header("location:".$hal."?pesan=tindakLanjutBerhasil");
    }else{
        header("location:".$hal."?pesan=tindakLanjutGagalUpdate");
    }
} else {
    header("location:".$hal."?pesan=tindakLanjutGagal");
}