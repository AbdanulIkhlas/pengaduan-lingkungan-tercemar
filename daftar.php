<?php 
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

    <!-- ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</head>

<body class="bg-cover bg-no-repeat w-full" style="background-image: url('assets/image/background.jpg');">
    <nav class="w-full flex justify-center">
        <!-- logo -->
        <section class="w-max box-border">
            <a href="index.php">
                <img src="assets/image/logo.png" alt="Logo" class="w-[320px]">
            </a>
        </section>
    </nav>
    <article class="w-[100%] m-auto h-full mb-16">
        <!-- Form masuk -->
        <section class="bg-white m-auto w-3/6 p-[30px] shadow-form rounded-lg">
            <h1 class="text-center w-full p-4 text-[40px] font-bold text-black mb-4 font-[Open Sans]
            tracking-wide">
                Daftar
            </h1>
            <form action="BE_daftar.php" method="post">
                <section class=" mb-4 flex justify-between w-full">
                    <!-- nama -->
                    <div class=" w-[48%]">
                        <label class="block tracking-wider mb-1" for="nama">Nama <span
                                class="text-red-600">*</span></label>
                        <input class="w-full border border-gray-400 px-3 py-2" type="text" name="nama" id="nama"
                            placeholder="Nama Lengkap" required>
                    </div>
                    <!-- jenis kelamin -->
                    <div class=" w-[48%]">
                        <label class="block tracking-wider mb-1" for="jenisKelamin">Jenis Kelamin <span
                                class="text-red-600">*</span></label>
                        <div class="relative">
                            <select class="w-full appearance-none border border-gray-400 px-3 py-2" name="jenisKelamin"
                                id="jenisKelamin" required>
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </section>
                <section class=" mb-4 flex justify-between w-full">
                    <!-- No hp -->
                    <div class=" w-[48%]">
                        <label class="block tracking-wider mb-1" for="noHP">
                            No. Telp Aktif <span class="text-red-600">*</span>
                        </label>
                        <input class="w-full border border-gray-400 px-3 py-2 appearance-none" type="text" name="noHP"
                            id="noHP" placeholder="Masukkan No Aktif" required>
                    </div>
                    <!-- tanggal lahir -->
                    <div class=" w-[48%]">
                        <label class="block tracking-wider mb-1" for="tanggalLahir">
                            Tanggal Lahir <span class="text-red-600">*</span>
                        </label>
                        <input class="w-full border border-gray-400 px-3 py-2" type="date" name="tanggalLahir"
                            id="tanggalLahir" required>
                    </div>
                </section>
                <section class=" mb-4 flex justify-between w-full">
                    <!-- Username -->
                    <div class=" w-[48%]">
                        <label class="block tracking-wider mb-1" for="username">
                            Username <span class="text-red-600">*</span>
                        </label>
                        <input class="w-full border border-gray-400 px-3 py-2" type="text" name="username" id="username"
                            placeholder="Username" required>
                    </div>
                    <!-- Email -->
                    <div class=" w-[48%]">
                        <label class="block tracking-wider mb-1" for="email">
                            Email <span class="text-red-600">*</span>
                        </label>
                        <input class="w-full border border-gray-400 px-3 py-2" type="email" name="email" id="email"
                            placeholder="contoh@gmail.com" required>
                    </div>
                </section>
                <section class="mb-4 flex justify-between w-full">
                    <!-- Password -->
                    <div class="relative w-[48%]">
                        <label class="block tracking-wider mb-1" for="PasswordInput">
                            Password <span class="text-red-600">*</span>
                        </label>
                        <div class="flex items-center border border-gray-400 px-3 py-2">
                            <input class="w-full border-none focus:outline-none" type="password" name="password"
                                id="PasswordInput" placeholder="Minimal 6 Karakter" minlength="6" required>
                            <div class="absolute right-2 flex items-center cursor-pointer w-max h-max"
                                id="TogglePasswordVisibility">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path
                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <!-- Konfirmasi Password -->
                    <div class="w-[48%] relative">
                        <label class="block tracking-wider mb-1" for="ConfirmPasswordInput">
                            Konfirmasi Password <span class="text-red-600">*</span>
                        </label>
                        <div class="flex items-center border border-gray-400 px-3 py-2">
                            <input class="w-full border-none focus:outline-none" type="password"
                                name="konfirmasiPassword" id="ConfirmPasswordInput" placeholder="Minimal 6 Karakter"
                                minlength="6" required>
                            <div class="absolute right-2 flex items-center cursor-pointer w-max h-max"
                                id="ToggleConfirmPasswordVisibility">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path
                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- button submit -->
                <button class="w-full py-3 mt-4 bg-[#006a43] text-white font-semibold tracking-wide rounded-[5px] hover:bg-[#104632] 
                hover:ease-in-out duration-300  hover:shadow-md hover:shadow-[#12382a] hover:-translate-y-1"
                    type="submit">DAFTAR</button>
                <div class="border border-t-gray-400 w-full my-10 relative"></div>
                <section class="text-center">
                    <h1>Sudah Punya Akun?</h1>
                    <a href="masuk.php">
                        <h2 class="mt-3 mb-6 text-blue-600 font-bold hover:drop-shadow-lg hover:underline hover:underline-offset-1 
                            hover:ease-in-out hover:duration-300">
                            MASUK SEKARANG
                        </h2>
                    </a>
                </section>
            </form>
        </section>

        <!-- button kembali ke beranda -->
        <section class="flex justify-center">
            <a href="index.php">
                <button class="bg-orange-500 py-3 px-5 text-white font-bold mt-7 m-auto hover:bg-orange-600 
                hover:ease-in-out hover:duration-300 hover:-translate-y-1  hover:shadow-lg  hover:shadow-[#9b6021]">
                    Kembali Ke Halaman Awal</button>
            </a>
        </section>
    </article>

    <footer></footer>
    <script>
        const passwordInput = document.getElementById('PasswordInput');
        const confirmPasswordInput = document.getElementById('ConfirmPasswordInput');
        const togglePasswordVisibility = document.getElementById('TogglePasswordVisibility');
        const toggleConfirmPasswordVisibility = document.getElementById('ToggleConfirmPasswordVisibility');

        const eyeIcon = `
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
        </svg>
    `;

        const eyeSlashIcon = `
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
            <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
            <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
        </svg>
    `;

        togglePasswordVisibility.addEventListener('click', () => {
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            togglePasswordVisibility.innerHTML = type === 'password' ? eyeIcon : eyeSlashIcon;
        });

        toggleConfirmPasswordVisibility.addEventListener('click', () => {
            const type = confirmPasswordInput.type === 'password' ? 'text' : 'password';
            confirmPasswordInput.type = type;
            toggleConfirmPasswordVisibility.innerHTML = type === 'password' ? eyeIcon : eyeSlashIcon;
        });
    </script>

</body>