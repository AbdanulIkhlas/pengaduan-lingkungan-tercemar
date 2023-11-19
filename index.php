<?php 
session_start();
if (isset($_SESSION['status'])) {
    $statusLogin = $_SESSION['status'];
    $username = $_SESSION['username'];
    $nama = $_SESSION['nama'];
} else {
    $statusLogin = false;
    $username = "belumLogin";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lindungi Bumi</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google fonts -->
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&display=swap"
        rel="stylesheet">

</head>

<body class="bg-cover bg-no-repeat w-full" style="background-image: 
    <?php echo $username == "admin09" ? "url('assets/image/bgAdmin.jpg')" : "url('assets/image/background.jpg')"; ?> ">
    <nav class=" bg-[#006a43] w-full shadow-bottom">
        <section class="flex justify-between w-[70%] m-auto ">
            <!-- logo -->
            <section class="w-max box-border">
                <a href="index.php">
                    <img src="assets/image/logo.png" alt="Logo" class="w-[120px]">
                </a>
            </section>

            <!-- navbar list -->
            <section class=" w-[80%] box-border ">
                <ul class="flex justify-end gap-4 items-center text-white font-semibold tracking-wider
                    text-base h-full font-[Poppins]">
                    <!-- ketika login jadi admin -->
                    <?php 
                    if($username == "admin09"){
                    ?>
                    <li class="px-4">
                        <a href="daftarEnkripsi.php">DAFTAR PENGADUAN</a>
                    </li>
                    <?php
                    }
                    ?>
                    <!-- ------------------------- -->
                    <?php if($statusLogin){?>
                    <li class="px-4 border-r-2 border-white">
                        <h1>Halo, <?php echo $nama ?></h1>
                    </li>
                    <li class="py-2 px-6 border border-white rounded-lg 
                    hover:bg-red-600 hover:text-white hover:ease-in-out hover:duration-500 hover:font-bold">
                        <a href="BE_logout.php">LOGOUT</a>
                    </li>
                    <?php }else{ ?>
                    <li class="px-4">
                        <a href="masuk.php">MASUK</a>
                    </li>
                    <li class="py-2 px-6 border border-white rounded-lg 
                    hover:bg-white hover:text-[#006a43] hover:ease-in-out hover:duration-500 hover:font-bold">
                        <a href="daftar.php">DAFTAR</a>
                    </li>
                    <?php } ?>
                </ul>
            </section>
        </section>
    </nav>
    <article class="w-[100%] m-auto h-full mb-16">
        <!-- Tulisan tulisan -->
        <section>
            <h1 class="text-4xl font-bold text-white text-center mt-16">
                Layanan Pengaduan Online Masyarakat
            </h1>
            <h2 class="text-2xl font-thin text-white text-center mt-5">
                Ajukan pengaduan agar sampah di sekitar anda cepat di eksekusi
            </h2>
            <div class="w-48 m-auto border-2 border-white mt-12 mb-16"></div>
        </section>

        <!-- Form pengaduan -->
        <section class="bg-white m-auto w-3/6 p-[30px] shadow-form">
            <h1 class="text-center w-full p-4 bg-[#006a43] text-white font-semibold text-2xl mb-4">
                Ajukan Pengaduan Anda
            </h1>
            <form action="#" method="post">
                <!-- deskripsi pengajuan -->
                <textarea class="w-full border border-gray-400 mb-4 px-[12px] py-[10px]" name="deskripsi" cols="30"
                    rows="10" placeholder="Ketik Laporan Anda *" required></textarea>
                <!-- input tanggal -->
                <section class="flex gap-2 items-center w-full border border-gray-400 mb-4 px-[12px] box-border">
                    <div class="border-r border-gray-400 h-[100%] text-gray-400 py-[10px] pr-2 ">
                        Masukkan Tanggal *
                    </div>
                    <input class="w-[32rem] py-2 focus:outline-none" type="date" name="tanggal" id="tanggalInput"
                        required>
                </section>
                <!-- input lokasi map -->
                <input class="w-full border border-gray-400 mb-4 px-[12px] py-[10px]" type="text" name="map"
                    placeholder="Masukkan Lokasi Map *" required>
                <!-- input detail lokasi -->
                <input class="w-full border border-gray-400 mb-4 px-[12px] py-[10px]" type="text" name="lokasi"
                    placeholder="Deskripsikan Detail Lokasi *" required>
                <!-- input gambar -->
                <section class="flex gap-2 items-center w-full border border-gray-400 mb-4 px-[12px]">
                    <div class="border-r border-gray-400 h-[100%] text-gray-400 py-[10px] pr-2">Masukkan Gambar * </div>
                    <input class="w-[32rem]" type="file" name="gambar" accept="image/*" required>
                </section>
                <div class="border border-t-gray-400 w-full mb-4"></div>

                <?php if($statusLogin){ ?>
                <section class="w-full flex justify-end">
                    <button class="p-2 px-4 bg-[#006a43] text-white font-semibold rounded-md 
                        hover:bg-[#104632] hover:ease-in-out duration-300  hover:shadow-md hover:shadow-[#12382a]"
                        type="submit">AJUKAN!</button>
                </section>
                <?php }else{ ?>
                <section class="w-full flex justify-end">
                    <a href="masuk.php?pesan=belumLogin" class="p-2 px-4 bg-[#006a43] text-white font-semibold rounded-md 
                    hover:bg-[#104632] hover:ease-in-out duration-300  hover:shadow-md hover:shadow-[#12382a]"
                        type="submit">AJUKAN!</a>
                </section>
                <?php } ?>
            </form>
        </section>
    </article>

    <footer></footer>
</body>

</html>