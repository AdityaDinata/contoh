<?php
class Database {
    private $con;

    // Konstruktor untuk membuat koneksi ke database
    public function __construct() {
        $this->con = mysqli_connect("localhost", "root", "", "costume_maker");

        // Periksa koneksi
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal: " . mysqli_connect_error();
            exit();
        }
    }

    // Method untuk menyimpan data ke database
    public function simpanData($name, $email, $phone, $message) {
        // Mengambil ID terakhir dari tabel
        $result = $this->con->query("SELECT id FROM rekomendasi ORDER BY id DESC LIMIT 1");
        $lastId = 1; // Default ID jika tabel kosong

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $lastId = (int)$row['id'] + 1; // Konversi ke integer dan tambahkan 1 ke ID terakhir
        }

        // Menyiapkan query untuk menyimpan data
        $sql = "INSERT INTO rekomendasi (id, name, email, phone, message) VALUES ('$lastId', '$name', '$email', '$phone', '$message')";

        if ($this->con->query($sql) === TRUE) {
            return $lastId; // Mengembalikan ID baru sebagai respons
        } else {
            return "Error: " . $sql . "<br>" . $this->con->error; // Kembalikan pesan kesalahan
        }
    }

    // Method untuk menutup koneksi
    public function tutupKoneksi() {
        $this->con->close();
    }
}

// Membuat objek Database
$database = new Database();

// Mengambil data dari formulir
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Menyimpan data ke database
$newId = $database->simpanData($name, $email, $phone, $message);

// Menutup koneksi
$database->tutupKoneksi();

// Memberikan respons ke klien jika data berhasil disimpan
echo $newId;
?>
