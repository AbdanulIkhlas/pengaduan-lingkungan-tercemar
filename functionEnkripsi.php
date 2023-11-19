<?php 
// Algortima caesar chipper
function caesarCipher($text, $key, $action) {
    $result = "";
    if($key>26){
        $key %= 26;
    }
    // jika key lebih dari 26 maka di mod 26
    $key = ($action == 'enkripsi') ? $key : -$key;
    // jika action=decrypt, $key akan menjadi negatif agar proses dekripsi berfungsi dengan benar
    // key=key(kunci)
    
    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];
        if (ctype_alpha($char)) { // jika huruf alfabet 
            $isUpperCase = ctype_upper($char); // huruf besar atau kecil
            $char = strtolower($char); // diubah ke huruf kecil
            // RUMUS C = (P+K) mod 26 ; P = (C-K) mod 26 

            $char = chr(((ord($char) - 97 + ($key) + 26) % 26) + 97);
            // ord=mengambil kode ASCII dari karakter 
            // dikurang 97 untuk memudahkan perhitungan (97=kode ASCII huruf a)
            // tambahkan dengan key atau kunci dan tambahkan 26 dan operasi modulo (%26) untuk memastikan hasil dalam rentang 0-25
            // ditambah 97 untuk mengembalikan dalam kode ASCII
            if ($isUpperCase) {
                $char = strtoupper($char);// jika aslinya huruf besar dikembalikan
            }
        } else {
            $char = $text[$i]; // Jaga karakter non-alphabet seperti spasi atau tanda baca
        }
        $result .= $char; //gabungkan karakter
    }

    return $result;
}


//  Algoritma XOR
function xorCipher($text, $key) {
    $result = '';
    $resultb = '';
    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];
        $keyChar = $key;
        
        // // Memilih jenis kunci berdasarkan pilihan pengguna
        // if ($_POST["key-type"] === "ascii-char") {
        //     $keyChar = $key;
        // } elseif ($_POST["key-type"] === "ascii-decimal") {
        //     $keyChar = chr($key);
        // }

        // RUMUS C = P XOR K ; P = C XOR K
        $resultChar = chr(ord($char) ^ ord($keyChar));
        // operasi XOR dalam bentuk ASCII dan diubah kembali menjadi karakter
        
        $result .= $resultChar;
    }
    return $result;
}

// Fungsi untuk mendekripsi file menggunakan AES
function deskripsiFileWithAES($inputFile, $outputFile, $key)
{
	// Membaca konten file
	$encryptedData = file_get_contents($inputFile);
	// Mengambil IV (Initialization Vector) dari awal file
	$iv = substr($encryptedData, 0, 16);
	$encryptedData = substr($encryptedData, 16);
	// Mendekripsi menggunakan AES-256-CBC
	$decryptedData = openssl_decrypt($encryptedData, 'aes-256-cbc', $key, 0, $iv);
	// Menyimpan file terdekripsi ke file baru
	file_put_contents($outputFile, $decryptedData);
}

// Fungsi untuk mengenkripsi file menggunakan AES
function enkripsiFileWithAES($inputFile, $outputFile, $key)
{
	$iv = random_bytes(16);
	$inputData = file_get_contents($inputFile);
	$encryptedData = openssl_encrypt($inputData, 'aes-256-cbc', $key, 0, $iv);
	file_put_contents($outputFile, $iv . $encryptedData);
}

// Fungsi untuk melakukan enkripsi menggunakan Base64
function enkripsiBase64($filename) {
    $enkripsiNamafile = base64_encode($filename);
    return $enkripsiNamafile;
}

// Fungsi untuk melakukan dekripsi menggunakan Base64
function deskripsiBase64($filename) {
    $deskripsiNamafile = base64_decode($filename);
    return $deskripsiNamafile;
}



?>