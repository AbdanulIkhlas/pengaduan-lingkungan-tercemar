<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:masuk.php?pesan=belumLogin");
}

include "BE_database.php";
include "functionEnkripsi.php";

function upload()
{
    $namafile = $_FILES['gambar']['name'];
    $size = $_FILES['gambar']['size'];
    $tmpfile = $_FILES['gambar']['tmp_name'];
    $errorfile = $_FILES['gambar']['error'];

    if ($errorfile === 0) {
        // mengecek format file yang di upload
        $formatFileValid = ["jpg", "jpeg", "png"];
        $format = pathinfo($namafile, PATHINFO_EXTENSION);
        if (!in_array($format, $formatFileValid)) {
            header("location:index.php?pesan=extensiSalah");
            exit();
        }
        // mengecek ukuran file
        if ($size > 1000000) {
            header("location:index.php?pesan=sizeGede");
            exit();
        }
    } else {
        // kesalahan tidak diketahui (error)
        header("location:index.php?pesan=errorTidakTerdeteksi");
        exit();
    }

    // jika lolos semua seleksi maka file siap di upload
    $namafile = uniqid();
    $namafile = $namafile . '.' . $format;
    $targetDirectory = "assets/image/pengajuan/";
	$targetPath = $targetDirectory . $namafile;
    if(move_uploaded_file($tmpfile, $targetPath)){
        // Enkripsi file gambar menggunakan AES
        $aesKey = "AESKey1234567890"; // Ganti dengan kunci yang diinginkan
        $hasilEnkripsiGambar = $targetDirectory."HasilEnkripsi/Terenkripsi_" . $namafile;
        enkripsiFileWithAES($targetPath, $hasilEnkripsiGambar, $aesKey );
    }
    
    clearstatcache();
    $pathGambar = enkripsiBase64($hasilEnkripsiGambar);
    return $pathGambar;
}

$deskripsi = $_POST['deskripsi'];
$tanggal = $_POST['tanggal'];
$map = $_POST['map'];
$lokasi = $_POST['lokasi'];
$gambar = upload();
$username = $_SESSION['username'];

// enkripsi deskripsi pengajuan
$resultCaesar = caesarCipher($deskripsi, 9, 'enkripsi');
$hasilEnkripsiPengajuan = xorCipher($resultCaesar, 9);

$sql = mysqli_query($konek, "SELECT * FROM users WHERE username = '$username'") or die(mysqli_error($konek));
$user = mysqli_fetch_array($sql);

$id_user = $user['id'];

// Memasukkan ke database
$query = mysqli_query($konek, "INSERT INTO data_pengaduan VALUES
    ( '', '$id_user','$hasilEnkripsiPengajuan', '$tanggal', '$map','$lokasi', '$gambar')")
    or die(mysqli_error($konek));

if ($query) {
    header("location:index.php?pesan=pengajuanBerhasil");
} else {
    header("location:index.php?pesan=pengajuanGagal");
}