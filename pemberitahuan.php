<?php 
session_start();
if (empty($_SESSION['username'])) {
    header("location:masuk.php?pesan=belumLogin");
}
if (isset($_SESSION['status'])) {
    $statusLogin = $_SESSION['status'];
    $username = $_SESSION['username'];
    $nama = $_SESSION['nama'];
} else {
    $statusLogin = false;
    $username = "belumLogin";
}
include 'BE_database.php';
include 'functionEnkripsi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lindungi Bumi</title>

    <!-- style -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/style/style.css">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&display=swap"
        rel="stylesheet">

</head>

<body class="bg-cover bg-no-repeat w-full" style="background-image: url('assets/image/bgAdmin.jpg');">
    <?php if (isset($_GET['pesanBerhasil'])) { ?>
    <?php if ($_GET['pesanBerhasil'] == "telahDibaca") { ?>
    <div
        class="notification bg-green-700 border border-white rounded-md font-bold p-5 text-white absolute top-10 right-5">
        Pemberitahuan Telah Dibaca
    </div>
    <?php } else if ($_GET['pesanBerhasil'] == "loginBerhasil") { ?>
    <div
        class="notification bg-green-700 border border-white rounded-md font-bold p-5 text-white absolute top-10 right-5">
        Login Berhasil
    </div>
    <?php } else if ($_GET['pesanBerhasil'] == "logout") { ?>
    <div
        class="notification bg-green-700 border border-white rounded-md font-bold p-5 text-white absolute top-10 right-5">
        Logout Berhasil
    </div>
    <?php } ?>
    <?php } ?>

    <?php if (isset($_GET['pesanGagal'])) { ?>
    <?php if ($_GET['pesanGagal'] == "gagalMembaca") { ?>
    <div
        class="notification bg-red-700 border border-white rounded-md p-5 font-bold text-white absolute top-10 right-5">
        Pemberitahuan Gagal Dibaca
    </div>
    <?php } ?>
    <?php } ?>
    <nav class=" bg-[#006a43] w-full shadow-bottom">
        <section class="flex justify-between w-[70%] m-auto">
            <!-- logo -->
            <section class="w-max box-border">
                <a href="index.php">
                    <img src="assets/image/logo.png" alt="Logo" class="w-[120px]">
                </a>
            </section>

            <!-- navbar list -->
            <section class=" w-[80%] box-border">
                <ul class="flex justify-end gap-4 items-center text-white font-semibold tracking-wider
                    text-base h-full font-[Poppins]">
                    <!-- ketika login jadi admin -->
                    <li class="px-4">
                        <a href="daftarEnkripsi.php">PEMBERITAHUAN</a>
                    </li>
                    <li class="px-4 border-r-2 border-white">
                        <h1>Halo, <?php echo $nama ?></h1>
                    </li>
                    <a href="BE_logout.php">
                        <li class="py-2 px-6 border border-white rounded-lg 
                        hover:bg-red-600 hover:text-white hover:ease-in-out hover:duration-500 hover:font-bold">
                            LOGOUT
                        </li>
                    </a>
                </ul>
            </section>
        </section>
    </nav>
    <article class="w-[100%] m-auto h-full mb-16">
        <section>
            <h1 class="text-4xl font-bold text-white text-center mt-16">
                Pemberitahuan dan Respon Pengaduan
            </h1>
            <h2 class="text-2xl font-thin text-white text-center">
                LindungiBumi
            </h2>
            <div class="w-48 m-auto border-2 border-white mt-9 mb-9"></div>
        </section>
        <!-- Data Pengaduan -->
        <?php 
        $query = mysqli_query($konek, "SELECT d.deskripsi_pengaduan, d.tanggal_pengaduan, n.pesan, n.telah_dibaca, n.id_notifikasi, u.nama 
        FROM notifikasi n INNER JOIN data_pengaduan d ON n.id_pengaduan = d.id_pengaduan 
        INNER JOIN users u ON n.id_user = u.id WHERE u.nama = '$nama'")
                or die(mysqli_error($konek));
        ?>
        <section class="bg-[#6b716f] m-auto w-[60%] p-5 shadow-form rounded-lg">
            <?php 
            while ($data = mysqli_fetch_array($query)) {
                $deskripsiXOR = xorCipher($data['deskripsi_pengaduan'],9);
                $hasilDeskripsi = caesarCipher($deskripsiXOR, 9, 'deskripsi');
                if($data['telah_dibaca'] == 0){
                    $background = "#ffffff";
                    $sudahDibaca = false;
                }else{
                    $background = "#d2dfdb";
                    $sudahDibaca = true;
                }
            ?>

            <div class="flex justify-between items-center w-full bg-[<?php echo $background ?>] p-2 text-white border border-white 
                rounded-md shadow-pemberitahuan hover:bg-[#d6e4e0] mb-5">
                <!-- container -->
                <div class="flex h-full w-full box-border gap-1">
                    <!-- icon -->
                    <div class="pt-5">
                        <?php if($sudahDibaca){ ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" fill="black"
                            class="bi bi-envelope-open" viewBox="0 0 16 16">
                            <path
                                d="M8.47 1.318a1 1 0 0 0-.94 0l-6 3.2A1 1 0 0 0 1 5.4v.817l5.75 3.45L8 8.917l1.25.75L15 6.217V5.4a1 1 0 0 0-.53-.882l-6-3.2ZM15 7.383l-4.778 2.867L15 13.117V7.383Zm-.035 6.88L8 10.082l-6.965 4.18A1 1 0 0 0 2 15h12a1 1 0 0 0 .965-.738ZM1 13.116l4.778-2.867L1 7.383v5.734ZM7.059.435a2 2 0 0 1 1.882 0l6 3.2A2 2 0 0 1 16 5.4V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5.4a2 2 0 0 1 1.059-1.765l6-3.2Z" />
                        </svg>
                        <?php } else{?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" fill="black"
                            class="bi bi-envelope" viewBox="0 0 16 16">
                            <path
                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                        </svg>
                        <?php } ?>
                    </div>
                    <!-- informasi -->

                    <div class="w-[100%] text-black box-border">
                        <!-- bagian atas -->
                        <div class="">
                            <div class="p-2">
                                <h1>Pengaduan anda :</h1>
                                <p>"<?php echo $hasilDeskripsi ?>"</p>
                            </div>
                            <div class="p-2 font-bold">
                                <p><?php echo $data['pesan'] ?> :) </p>
                            </div>
                        </div>
                        <!-- bagian bawah -->
                        <div class="border border-black"></div>
                        <div class="flex justify-between italic text-sm w-[100%] p-2">
                            <h1><?php echo $data['tanggal_pengaduan'] ?></h1>
                            <?php if($sudahDibaca){ ?>
                            <div class="font-normal">Tandai Telah Dibaca</div>
                            <?php }else{ ?>
                            <div class="flex">
                                <a href="BE_tandaiTelahDibaca.php?idNotifikasi=<?php echo $data['id_notifikasi'] ?>"
                                    class="font-bold">Tandai Telah Dibaca</a>
                                <div
                                    class="w-2 h-2 relative top-0 right-0 border border-red-500 bg-red-500 rounded-full">
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>


        </section>
    </article>
</body>