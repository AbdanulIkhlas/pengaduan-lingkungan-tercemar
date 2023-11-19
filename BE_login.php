<?php
session_start();
include 'BE_database.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($konek, "SELECT * FROM users WHERE username = BINARY '$username'") or die(mysqli_error($konek));
$cek = mysqli_num_rows($query);
$user = mysqli_fetch_assoc($query);

if ($cek > 0 && hash('sha256', $password) == $user['password']) {
    // Login berhasil
    $_SESSION['username'] = $user['username'];
    $_SESSION['nama'] = $user['nama'];
    $_SESSION['status'] = true;
    if($_SESSION['username'] == "admin09"){
        header("location:daftarEnkripsi.php?pesan=berhasilLoginBSebagaiAdmin");
    }else{
        header("location:index.php?pesan=loginBerhasil");
    }
} else {
    // Login gagal
    header("location:masuk.php?pesan=loginGagal");
}
?>