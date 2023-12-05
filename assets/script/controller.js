document.addEventListener('DOMContentLoaded', function () {
    const buttonsTindakLanjut = document.querySelectorAll('.buttonTindakLanjut');
    const buttonsHapus = document.querySelectorAll('.buttonHapus');

    buttonsTindakLanjut.forEach(button => {
        button.addEventListener('click', function () {
            const idPengaduan = button.getAttribute('data-idpengaduan');
            const halaman = button.getAttribute('data-halaman');
            const idUser = button.getAttribute('data-iduser');
            // Gunakan data ini untuk mengatur konten modalTindakLanjut
            document.querySelector('.modalTindakLanjut').style.display = 'block';

            // Set atribut href pada linkTindakLanjut
            const linkTindakLanjut = document.querySelector('.linkTindakLanjut');
            console.log(`id pengajuan : ${idPengaduan}`);
            console.log(`id user : ${idUser}`);
            console.log(`halaman : ${halaman}`);
            linkTindakLanjut.href = `BE_tindakLanjut.php?idPengaduan=${idPengaduan}&halaman=${halaman}&idUser=${idUser}`;
        });
    });

    buttonsHapus.forEach(button => {
        button.addEventListener('click', function () {
            const idPengaduan = button.getAttribute('data-idpengaduan');
            const halaman = button.getAttribute('data-halaman');
            // Gunakan data ini untuk mengatur konten modalHapus
            document.querySelector('.modalHapus').style.display = 'block';

            // Set atribut href pada linkHapus
            const linkHapus = document.querySelector('.linkHapus');
            linkHapus.href = `BE_hapusPengaduan.php?idPengaduan=${idPengaduan}&halaman=${halaman}`;
        });
    });

    const batalTindakLanjut = document.querySelector('.batalkanTindakLanjut');
    const batalHapus = document.querySelector('.batalkanHapus');

    batalTindakLanjut.addEventListener('click', function () {
        document.querySelector('.modalTindakLanjut').style.display = 'none';
    });

    batalHapus.addEventListener('click', function () {
        document.querySelector('.modalHapus').style.display = 'none';
    });
});


