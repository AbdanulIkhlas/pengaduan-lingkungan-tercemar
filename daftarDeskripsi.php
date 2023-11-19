<?php 
$username = "admin";
$statusLogin = true;
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
            <section class=" w-[50%] box-border">
                <ul class="flex justify-end gap-4 items-center text-white font-semibold tracking-wider
                    text-base h-full font-[Poppins]">
                    <!-- ketika login jadi admin -->
                    <li class="px-4 border-r-2 border-white">
                        <h1>Halo, <?php echo $username ?></h1>
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
        <!-- Form masuk -->
        <section class="bg-white m-auto w-[90%] p-[30px] shadow-form rounded-lg">
            <div class="flex justify-between items-center w-full bg-[#006a43] py-3 px-5 text-white">
                <h1 class="font-semibold text-xl"> Status : Ter-Deskripsi </h1>
                <a href="daftarEnrkipsi.php">
                    <button class="py-2 px-4 border border-white rounded-lg font-bold shadow-md shadow-black active:shadow-sm
                    active:translate-y-[2px] active:ease-in-out active:duration-100
                    hover:bg-[#035336] hover:text-white hover:ease-in-out hover:duration-500 hover:translate-y-[-1px]">
                        Enkripsi Data
                    </button>
                </a>
            </div>

            <table class="border-collapse border border-slate-500 w-full mt-5">
                <thead class="h-4">
                    <tr class="h-4 text-center bg-[#006a43] font-semibold text-white">
                        <th class="border border-black w-[17%] h-11">Nama</th>
                        <th class="border border-black w-[13%] h-11">No Telp</th>
                        <th class="border border-black w-[21%] h-11">Deskripsi Pengaduan</th>
                        <th class="border border-black w-[14%] h-11">Lokasi Map</th>
                        <th class="border border-black w-[13%] h-11">Detail Lokasi</th>
                        <th class="border border-black w-[22%] h-11">Gambar</th>
                    </tr>
                </thead>
                <tbody class="p-4">
                    <tr class="p-4">
                        <td class="border border-slate-700 text-center p-2 box-border">Muhammad Abdanul Ikhlas</td>
                        <td class="border border-slate-700 text-center p-2 box-border">082271583369</td>
                        <td class="border border-slate-700 text-center p-2 box-border">
                            Sorry banget nih, tapi sampah di sekitar rumah saya sudah
                            sangat membludak, tolong segera di eksekusi
                        </td>
                        <td class="border border-slate-700 p-2 box-border">
                            <div class="flex justify-center">
                                <a class="inline-block py-2 px-4 m-auto border border-white rounded-lg font-bold bg-[#027c4f] text-white
                                    hover:bg-[#004c30]  hover:ease-in-out hover:duration-500 hover:translate-y-[-1px]"
                                    href="gmaps.com">
                                    Lihat Lokasi
                                </a>
                            </div>
                        </td>
                        <td class="border border-slate-700 text-center p-2 box-border">Pas dekat toko yang warna hijau
                        </td>
                        <td class="border border-slate-700 m-auto p-2 box-border">
                            <div class="flex justify-center">
                                <img class="w-[320px] h-[220px] border border-black rounded-md"
                                    src="assets/image/sampah1.png" alt="Sampah">
                            </div>
                        </td>
                    </tr>
                    <tr class="p-4">
                        <td class="border border-slate-700 text-center p-2 box-border">Tegar Wibisana</td>
                        <td class="border border-slate-700 text-center p-2 box-border">082277364471</td>
                        <td class="border border-slate-700 text-center p-2 box-border">
                            Sampah semakin meraja lela, tolonggg eksekusi secepatnya sirrr
                        </td>
                        <td class="border border-slate-700 p-2 box-border">
                            <div class="flex justify-center">
                                <a class="inline-block py-2 px-4 m-auto border border-white rounded-lg font-bold bg-[#027c4f] text-white
                                hover:bg-[#004c30]  hover:ease-in-out hover:duration-500 hover:translate-y-[-1px]"
                                    href="gmaps.com">
                                    Lihat Lokasi
                                </a>
                            </div>
                        </td>
                        <td class="border border-slate-700 text-center p-2 box-border">Samping mirota</td>
                        <td class="border border-slate-700 m-auto p-2 box-border">
                            <div class="flex justify-center">
                                <img class="w-[320px] h-[220px] border border-black rounded-md"
                                    src="assets/image/sampah2.png" alt="Sampah">
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>


        </section>
    </article>

    <footer></footer>
</body>