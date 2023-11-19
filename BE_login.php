<?php
session_start();
include 'BE_database.php';
// $konek = new mysqli('localhost', 'root', '', 'lindungi_bumi');

$username = $_POST['username'];
$password = $_POST['password'];


$query = mysqli_query($konek, "select * from users where
    username = BINARY'$username' and password=BINARY'$password'") or die(mysqli_error($konek));
$cek = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);

if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['status'] = true;
    header("location:index.php");
} else {
    header("location:masuk.php?pesan=gagal");
}