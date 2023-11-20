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
    <?php if ($_GET['pesanBerhasil'] == "hapusBerhasil") { ?>
    <div
        class="notification bg-green-700 border border-white rounded-md font-bold p-5 text-white absolute top-10 right-5">
        Berhasil Menghapus Pengaduan
    </div>
    <?php } else if ($_GET['pesanBerhasil'] == "tindakLanjutBerhasil") { ?>
    <div
        class="notification bg-green-700 border border-white rounded-md font-bold p-5 text-white absolute top-10 right-5">
        Tindak Lanjut Berhasil Diteruskan
    </div>
    <?php } ?>
    <?php } ?>

    <?php if (isset($_GET['pesanGagal'])) { ?>
    <?php if ($_GET['pesanGagal'] == "hapusGagal") { ?>
    <div
        class="notification bg-red-700 border border-white rounded-md p-5 font-bold text-white absolute top-10 right-5">
        Gagal Menghapus Pengaduan
    </div>
    <?php } else if ($_GET['pesanGagal'] == "tindakLanjutGagal") { ?>
    <div
        class="notification bg-red-700 border border-white rounded-md p-5 font-bold text-white absolute top-10 right-5">
        Tindak Lanjut Gagal Diteruskan
    </div>
    <?php } if ($_GET['pesanGagal'] == "tindakLanjutGagalUpdate") { ?>
    <div
        class="notification bg-red-700 border border-white rounded-md p-5 font-bold text-white absolute top-10 right-5">
        Gagal Update
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
                        <a href="daftarEnkripsi.php">DAFTAR PENGADUAN</a>
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
                Daftar Pengaduan Lingkungan Tercemar
            </h1>
            <h2 class="text-2xl font-thin text-white text-center">
                Dari Masyarakat
            </h2>
            <div class="w-48 m-auto border-2 border-white mt-9 mb-9"></div>
        </section>
        <!-- Data Pengaduan -->
        <section class="bg-white m-auto w-[97%] p-[30px] shadow-form rounded-lg">
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
                $query = mysqli_query($konek, "SELECT u.id, u.nama, u.no_telp,d.id_pengaduan, d.deskripsi_pengaduan, d.tanggal_pengaduan, 
                d.maps, d.detail_lokasi, d.gambar,d.tindak_lanjut FROM users u INNER JOIN data_pengaduan d ON u.id = d.id_user") 
                or die(mysqli_error($konek));
                ?>
                <thead class="h-4">
                    <tr class="h-4 text-center bg-[#006a43] font-semibold text-white">
                        <th class="border border-black w-[13%] h-11">Nama</th>
                        <th class="border border-black w-[10%] h-11">No Telp</th>
                        <th class="border border-black w-[19%] h-11">Deskripsi Pengaduan</th>
                        <th class="border border-black w-[9%] h-11">Tanggal Pengaduan</th>
                        <th class="border border-black w-[12%] h-11">Lokasi Map</th>
                        <th class="border border-black w-[13%] h-11">Detail Lokasi</th>
                        <th class="border border-black w-[17%] h-11">Gambar</th>
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
                        <td class="border border-slate-700 text-center p-2 box-border break-words w-[19%]">
                            <?php echo $hasilDeskripsi ?></td>
                        <td class="border border-slate-700 text-center p-2 box-border ">
                            <div class="w-full">
                                <?php echo $data['tanggal_pengaduan'] ?>
                            </div>
                        </td>
                        <td class="border border-slate-700 p-2 box-border">
                            <div class="flex justify-center">
                                <a class="inline-block py-2 px-4 m-auto rounded-lg font-bold bg-[#027c4f] text-white
                                hover:bg-[#104632] hover:ease-in-out duration-300 hover:shadow-md hover:shadow-[#12382a]  hover:translate-y-[-1px]"
                                    href="<?php echo $data['maps'] ?>">
                                    Lihat Lokasi
                                </a>
                            </div>
                        </td>
                        <td class="border border-slate-700 text-center p-2 box-border">
                            <?php echo $data['detail_lokasi'] ?></td>
                        <td class="border border-slate-700 m-auto p-2 box-border">
                            <div class="flex justify-center">
                                <img class="w-[260px] h-[160px] border border-black rounded-md"
                                    src="<?php echo $hasilDeskripsiGambar ?>" alt="Sampah">
                            </div>
                        </td>
                        <!-- kolom action -->
                        <td class="border border-slate-700 m-auto box-border">
                            <div class="flex flex-col items-center gap-3 ">
                                <!-- container action -->
                                <div class="flex  gap-5">
                                    <!-- tindak lanjut -->
                                    <div>
                                        <div class="buttonTindakLanjut cursor-pointer"
                                            data-idpengaduan="<?php echo $data['id_pengaduan']; ?>" data-halaman="2"
                                            data-iduser="<?php echo $data['id']; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="green"
                                                class="bi bi-check-square-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z" />
                                            </svg>
                                        </div>
                                        <!-- modal tindak lanjut -->
                                        <div class=" modalTindakLanjut absolute z-10 hidden"
                                            aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                            <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity">
                                            </div>
                                            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                                <div
                                                    class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                                    <div
                                                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                                            <div class="sm:flex sm:items-start">
                                                                <div
                                                                    class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                                    <svg class="h-6 w-6 text-red-600" fill="none"
                                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                                        stroke="currentColor" aria-hidden="true">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                                                    </svg>
                                                                </div>
                                                                <div
                                                                    class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                                                    <h3 class="text-base font-semibold leading-6 text-gray-900"
                                                                        id="modal-title">Menindaklanjuti Pengaduan</h3>
                                                                    <div class="mt-2">
                                                                        <p class="text-sm text-gray-500">Melakukan
                                                                            tindak lanjut sekarang?
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                            <a class="linkTindakLanjut" href="BE_tindakLanjut.php?">
                                                                <button type=" button"
                                                                    class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 
                                                                    text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                                                                    Tindak Lanjut
                                                                </button>
                                                            </a>
                                                            <button type="button"
                                                                class="batalkanTindakLanjut mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 
                                                                shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                                                Batal
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- hapus -->
                                    <div>
                                        <div class="buttonHapus cursor-pointer"
                                            data-idpengaduan="<?php echo $data['id_pengaduan']; ?>" data-halaman="2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red"
                                                class="bi bi-slash-square-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm9.354 5.354-6 6a.5.5 0 0 1-.708-.708l6-6a.5.5 0 0 1 .708.708z" />
                                            </svg>
                                        </div>
                                        <!-- modal/notif -->
                                        <div class="modalHapus absolute z-10 hidden" aria-labelledby="modal-title"
                                            role="dialog" aria-modal="true">
                                            <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity">
                                            </div>
                                            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                                <div
                                                    class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                                    <div
                                                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                                            <div class="sm:flex sm:items-start">
                                                                <div
                                                                    class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                                    <svg class="h-6 w-6 text-red-600" fill="none"
                                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                                        stroke="currentColor" aria-hidden="true">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                                                    </svg>
                                                                </div>
                                                                <div
                                                                    class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                                                    <h3 class="text-base font-semibold leading-6 text-gray-900"
                                                                        id="modal-title">Menghapus Pengaduan</h3>
                                                                    <div class="mt-2">
                                                                        <p class="text-sm text-gray-500">Apakah anda
                                                                            yakin
                                                                            ingin menghapus pengaduan?</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                            <a href="BE_hapusPengaduan.php?" class=" linkHapus">
                                                                <button type="button"
                                                                    class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 
                                                                    text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                                                                    Hapus
                                                                </button>
                                                            </a>
                                                            <button type="button"
                                                                class="batalkanHapus mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 
                                                                shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                                                                Batal
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border border-t-black w-full"></div>
                                <!-- STATUS -->
                                <?php if($data['tindak_lanjut']==0){?>
                                <div
                                    class="bg-[#b59d00] text-white font-semibold  w-[90%] p-1 py-2 text-center text-sm rounded-md">
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

    <script src="assets/script/controller.js"></script>
</body>