<?php
include "BE_database.php";
$nama = $_POST['nama'];
$jenisKelamin = $_POST['jenisKelamin'];
$noHP = $_POST['noHP'];
$tanggalLahir = $_POST['tanggalLahir'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$konfirmasiPassword = $_POST['konfirmasiPassword'];


if ($password != $konfirmasiPassword) {
    return header("location:daftar.php?pesan=PasswordBeda");
}

// Enkripsi password menggunakan password_hash
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$query = mysqli_query($konek, "INSERT INTO users VALUES
    ('','$username','$hashedPassword','$nama','$jenisKelamin','$noHP','$tanggalLahir','$email')
    ") or die(mysqli_error($konek));

if ($query) {
    header("location:masuk.php?pesan=daftarBerhasil");
} else {
    header("location:daftar.php?pesan=daftarGagal");
}