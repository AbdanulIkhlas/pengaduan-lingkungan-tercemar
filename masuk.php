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
        <section class="bg-white m-auto w-2/6 p-[30px] shadow-form rounded-lg">
            <h1 class="text-center w-full p-4 text-[40px] font-bold text-black mb-4 font-[Open Sans]
            tracking-wide">
                Masuk
            </h1>
            <form action="BE_login.php" method="post">
                <!-- input username-->
                <label class="tracking-wider" for="username">Username</label>
                <input class="w-full border border-gray-400 mb-4 px-[12px] py-[10px]" type="text" name="username"
                    required>
                <!-- input password -->
                <div class="relative mb-4">
                    <label class="block tracking-wider mb-1" for="Password">
                        Password
                    </label>
                    <div class="flex items-center border border-gray-400 px-[12px] py-[10px]">
                        <input class="w-full border-none focus:outline-none" type="password" name="password"
                            id="PasswordInput" required>
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
                <button class="w-full p-2 px-4 mt-2 bg-[#006a43] text-white font-semibold rounded-[5px] hover:bg-[#104632] 
                hover:ease-in-out duration-300  hover:shadow-md hover:shadow-[#12382a] hover:-translate-y-1"
                    type="submit">MASUK</button>
                <div class="border border-t-gray-400 w-full my-10 relative"></div>
                <section class="text-center">
                    <h1>Anda Belum Punya Akun?</h1>
                    <a href="daftar.php">
                        <h2 class="mt-3 mb-6 text-blue-600 font-bold hover:drop-shadow-lg hover:underline hover:underline-offset-1 
                            hover:ease-in-out hover:duration-300">
                            DAFTAR SEKARANG
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
        const togglePasswordVisibility = document.getElementById('TogglePasswordVisibility');

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
    </script>
</body>