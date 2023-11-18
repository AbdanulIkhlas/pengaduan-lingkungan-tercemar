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
            <form action="#" method="post">
                <!-- input username-->
                <label class="tracking-wider" for="username">Username</label>
                <input class="w-full border border-gray-400 mb-4 px-[12px] py-[10px]" type="text" name="username"
                    required>
                <!-- input password -->
                <label class="tracking-wider" for="password">Password</label>
                <input class="w-full border border-gray-400 mb-4 px-[12px] py-[10px]" type="password" name="password"
                    required>
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
</body>