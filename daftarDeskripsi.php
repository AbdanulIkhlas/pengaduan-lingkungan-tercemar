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

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&display=swap"
        rel="stylesheet">

</head>

<body class="bg-cover bg-no-repeat w-full" style="background-image: url('assets/image/bgAdmin.jpg');">
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
                        <a href="daftarEnkripsi.php">DAFTAR PENGADUAN</a>
                    </li>
                    <li class="px-4 border-r-2 border-white">
                        <h1>Halo, <?php echo $nama ?></h1>
                    </li>
                    <li class="py-2 px-6 border border-white rounded-lg 
                    hover:bg-red-600 hover:text-white hover:ease-in-out hover:duration-500 hover:font-bold">
                        <a href="BE_logout.php">LOGOUT</a>
                    </li>
                </ul>
            </section>
        </section>
    </nav>
    <article class="w-[100%] m-auto h-full mb-16">
        <section>
            <h1 class="text-4xl font-bold text-white text-center mt-16">
                Daftar Pengaduan Lingkungan Tercemar
            </h1>
            <h2 class="text-2xl font-thin text-white text-center">
                Dari Masyarakat
            </h2>
            <div class="w-48 m-auto border-2 border-white mt-9 mb-9"></div>
        </section>
        <!-- Data Pengaduan -->
        <section class="bg-white m-auto w-[90%] p-[30px] shadow-form rounded-lg">
            <div class="flex justify-between items-center w-full bg-[#006a43] py-3 px-5 text-white">
                <div class="flex gap-2">
                    <h1 class="font-semibold text-xl"> Status : Ter-Deskripsi </h1>
                    <div class="border-r border-l border-white "></div>
                    <?php 
                    $sql = mysqli_query($konek, "SELECT COUNT(*) AS banyak_data FROM data_pengaduan") or die(mysqli_error($konek));
                    $row = mysqli_fetch_assoc($sql);
                    if (!$row) {
                        $banyakData = 0;
                    }else{
                        $banyakData = $row['banyak_data'];
                    }
                    ?>
                    <h1 class="font-semibold text-xl"> Total Pengaduan : <?php echo $banyakData ?> </h1>
                </div>
                <a href="daftarEnkripsi.php">
                    <button class="py-2 px-4 border border-white rounded-lg font-bold shadow-md shadow-black active:shadow-sm
                    active:translate-y-[2px] active:ease-in-out active:duration-100
                    hover:bg-[#035336] hover:text-white hover:ease-in-out hover:duration-500 hover:translate-y-[-1px]">
                        Enkripsi Data
                    </button>
                </a>
            </div>
            <table class="border-collapse border border-slate-500 w-full mt-5">
                <?php 
                $query =  mysqli_query($konek, "SELECT u.nama, u.no_telp,d.id_pengaduan, d.deskripsi_pengaduan, d.tanggal_pengaduan, 
                d.maps, d.detail_lokasi, d.gambar,d.tindak_lanjut FROM users u INNER JOIN data_pengaduan d ON u.id = d.id_user") 
                or die(mysqli_error($konek));
                ?>
                <thead class="h-4">
                    <tr class="h-4 text-center bg-[#006a43] font-semibold text-white">
                        <th class="border border-black w-[16%] h-11">Nama</th>
                        <th class="border border-black w-[11%] h-11">No Telp</th>
                        <th class="border border-black w-[21%] h-11">Deskripsi Pengaduan</th>
                        <th class="border border-black w-[12%] h-11">Lokasi Map</th>
                        <th class="border border-black w-[13%] h-11">Detail Lokasi</th>
                        <th class="border border-black w-[20%] h-11">Gambar</th>
                        <th class="border border-black w-[8%] h-11">Tindak Lanjut</th>
                    </tr>
                </thead>
                <?php 
                while ($data = mysqli_fetch_array($query)) {
                    $aesKey = "AESKey1234567890";
                    $deskripsiPathGambar = deskripsiBase64($data['gambar']);
                    $hasilDeskripsiGambar = "assets/image/pengajuan/HasilDeskripsi/DeskripsiGambar_" . basename($deskripsiPathGambar);
                    deskripsiFileWithAES($deskripsiPathGambar, $hasilDeskripsiGambar, $aesKey);
                    $deskripsiXOR = xorCipher($data['deskripsi_pengaduan'],9);
                    $hasilDeskripsi = caesarCipher($deskripsiXOR, 9, 'deskripsi');
                ?>
                <tbody class="p-4">
                    <tr class="p-4">
                        <td class="border border-slate-700 text-center p-2 box-border"><?php echo $data['nama'] ?></td>
                        <td class="border border-slate-700 text-center p-2 box-border"><?php echo $data['no_telp'] ?>
                        </td>
                        <td class="border border-slate-700 text-center p-2 box-border break-words">
                            <?php echo $hasilDeskripsi ?></td>
                        <td class="border border-slate-700 p-2 box-border">
                            <div class="flex justify-center">
                                <a class="inline-block py-2 px-4 m-auto border border-white rounded-lg font-bold bg-[#027c4f] text-white
                                    hover:bg-[#004c30]  hover:ease-in-out hover:duration-500 hover:translate-y-[-1px]"
                                    href="<?php echo $data['maps'] ?>">
                                    Lihat Lokasi
                                </a>
                            </div>
                        </td>
                        <td class="border border-slate-700 text-center p-2 box-border">
                            <?php echo $data['detail_lokasi'] ?></td>
                        <td class="border border-slate-700 m-auto p-2 box-border">
                            <div class="flex justify-center">
                                <img class="w-[280px] h-[180px] border border-black rounded-md"
                                    src="<?php echo $hasilDeskripsiGambar ?>" alt="Sampah">
                            </div>
                        </td>
                        <td class="border border-slate-700 m-auto box-border w-[22%]">
                            <div class="flex flex-col items-center gap-6 ">
                                <!-- container action -->
                                <div class="flex  gap-5">

                                    <!-- tindak lanjut -->
                                    <a href="BE_tindakLanjut.php?idPengaduan=<?php echo $data['id_pengaduan'] ?>">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="green"
                                                class="bi bi-check-square-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z" />
                                            </svg>
                                        </div>
                                    </a>
                                    <!-- hapus -->
                                    <a href="BE_hapusPengaduan.php?idPengaduan=<?php echo $data['id_pengaduan'] ?>">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red"
                                                class="bi bi-slash-square-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm9.354 5.354-6 6a.5.5 0 0 1-.708-.708l6-6a.5.5 0 0 1 .708.708z" />
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                                <div class="border border-t-black w-full"></div>
                                <!-- STATUS -->
                                <?php if($data['tindak_lanjut']==0){?>
                                <div
                                    class="bg-[#027c4f] text-white font-semibold  w-[90%] p-1 py-2 text-center text-sm rounded-md">
                                    <p>Belum Di Tindak Lanjuti</p>
                                </div>
                                <?php }else{ ?>
                                <div
                                    class="bg-[#027c4f] text-white font-semibold  w-[90%] p-1 py-2 text-center text-sm rounded-md">
                                    <p>Sudah Di Tindak Lanjuti</p>
                                </div>
                                <?php } ?>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>


        </section>
    </article>

    <footer></footer>
</body>