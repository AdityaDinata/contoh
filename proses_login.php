<?php
session_start();

// Fungsi untuk membersihkan input
function clean($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Dapatkan data dari formulir dan bersihkan
$nik = clean($_POST['nik']);
$nama_lengkap = clean($_POST['nama_lengkap']);

// Jika username dan password adalah admin dan 12345, arahkan ke admin.php
if (strtolower($nik) === '12345' && strtolower($nama_lengkap) === 'admin') {
    header("Location: admin.php");
    exit;
}

// Baca file konfigurasi
$file = 'config.txt';
$lines = file($file, FILE_IGNORE_NEW_LINES);

// Inisialisasi variabel flag untuk menandai apakah pengguna ditemukan dalam file konfigurasi
$userFound = false;

// Loop melalui setiap baris dalam file konfigurasi
foreach ($lines as $line) {
    // Pisahkan data pada baris menggunakan delimiter "|"
    $data = explode('|', $line);

    // Periksa apakah username dan password cocok dengan data dalam baris
    if (count($data) === 2 && strtolower($data[0]) === strtolower($nik) && strtolower($data[1]) === strtolower($nama_lengkap)) {
        // Jika cocok, atur session dan arahkan pengguna ke tampilan.php
        $_SESSION['nik'] = $nik;
        $_SESSION['nama_lengkap'] = $nama_lengkap;

        // Set cookie untuk menyimpan informasi pengguna
        setcookie('user', json_encode(['nik' => $nik, 'nama_lengkap' => $nama_lengkap]), 0, "/");

        // Redirect ke tampilan.php
        header("Location: tampilan.php");
        exit;
    }

    // Tandai bahwa pengguna ditemukan dalam file konfigurasi
    $userFound = true;
}

// Jika tidak ada baris yang cocok, arahkan ke index.php dan tampilkan pesan kesalahan
if ($userFound) {
    ?>
    <script type="text/javascript">
        window.alert('Password Atau Nama Lengkap Yang Anda Masukkan Salah');
        window.location.assign('index.php');
    </script>
    <?php
} else {
    // Jika tidak ada baris dalam file konfigurasi, arahkan ke tampilan.php
    $_SESSION['nik'] = $nik;
    $_SESSION['nama_lengkap'] = $nama_lengkap;

    // Set cookie untuk menyimpan informasi pengguna
    setcookie('user', json_encode(['nik' => $nik, 'nama_lengkap' => $nama_lengkap]), 0, "/");

    // Redirect ke tampilan.php
    header("Location: tampilan.php");
    exit;
}
?>
