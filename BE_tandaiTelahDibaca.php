<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:masuk.php?pesan=belumLogin");
}

include "BE_database.php";
$idNotifikasi = $_GET['idNotifikasi'];
echo $idNotifikasi;

$query = mysqli_query($konek, "UPDATE notifikasi SET telah_dibaca = '1' WHERE id_notifikasi = $idNotifikasi")
    or die(mysqli_error($konek));


if ($query) {
    header("location:pemberitahuan.php?pesan=telahDibaca");
} else {
    header("location:pemberitahuan.php?pesan=gagalMembaca");
}