<?php
// // Cek apakah pengguna sudah masuk ke dalam sesi login
// if (!isset($_SESSION['nik']) || !isset($_SESSION['nama_lengkap'])) {
//     // Jika tidak, redirect ke halaman login
//     header("Location: index.php");
//     exit; // Hentikan eksekusi skrip selanjutnya setelah redirect
// }

?>
<?php
class Database {
    private $con;

    // Konstruktor untuk membuat koneksi ke database
    public function __construct() {
        $this->con = mysqli_connect("sql104.infinityfree.com", "if0_36349965", "Sela1234567890", "if0_36349965_costum");

        // Periksa koneksi
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal: " . mysqli_connect_error();
            exit();
        }
    }
public function getAllCostumeIDs() {
        $query = "SELECT id FROM costume";
        $result = mysqli_query($this->con, $query);
        $costume_ids = array();
    
        // Ambil semua costume_id dan tambahkan ke dalam array
        while ($row = mysqli_fetch_assoc($result)) {
            $costume_ids[] = $row['id'];
        }
    
        return $costume_ids;
    }
   // Fungsi untuk menambahkan data ke database
public function tambahData($nama_karakter, $asal, $gambar_data) {
    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO costume (Nama_Karakter, asal, foto) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($this->con, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $nama_karakter, $asal, $gambar_data);
    mysqli_stmt_execute($stmt);

    // Periksa apakah data berhasil ditambahkan
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        return true;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

// Fungsi untuk memeriksa apakah id sudah ada di dalam tabel
private function idExists($id) {
    $stmt = mysqli_prepare($this->con, "SELECT id FROM costume WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $num_rows = mysqli_stmt_num_rows($stmt);
    mysqli_stmt_close($stmt);
    return $num_rows > 0;
}

// Fungsi untuk mendapatkan ID terakhir dari tabel costume
public function getLastInsertedID() {
    return mysqli_insert_id($this->con);
}

// Fungsi untuk menambahkan data detail costume ke tabel "detail_costume"
public function tambahDetail($harga, $waktu_pembuatan, $ukuran, $bahan, $costume_id) {
    // Periksa apakah detail kostum sudah ada dalam database
    if ($this->detailCostumeExists($costume_id)) {
        return "Detail kostum sudah ada dalam database.";
    }

    // Jika detail kostum belum ada, tambahkan detail kostum baru
    $sql = "INSERT INTO detail_costume (harga, waktu_pembuatan, ukuran, bahan, costume_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($this->con, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $harga, $waktu_pembuatan, $ukuran, $bahan, $costume_id);
    mysqli_stmt_execute($stmt);

    // Periksa apakah data berhasil ditambahkan
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        return true;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

// Fungsi untuk memeriksa apakah detail kostum sudah ada dalam database
private function detailCostumeExists($costume_id) {
    $stmt = mysqli_prepare($this->con, "SELECT id FROM detail_costume WHERE costume_id = ?");
    mysqli_stmt_bind_param($stmt, "i", $costume_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $num_rows = mysqli_stmt_num_rows($stmt);
    mysqli_stmt_close($stmt);
    return $num_rows > 0;
}

public function updateHarga($id, $harga_baru) {
    // Periksa apakah ID yang diberikan ada dalam tabel costume
    if (!$this->idExists($id)) {
        return "Costume dengan ID $id tidak ditemukan.";
    }

    // Lakukan kueri untuk memperbarui harga
    $stmt = mysqli_prepare($this->con, "UPDATE detail_costume SET harga = ? WHERE costume_id = ?");
    mysqli_stmt_bind_param($stmt, "si", $harga_baru, $id);
    mysqli_stmt_execute($stmt);

    // Periksa apakah harga berhasil diperbarui
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        return "Harga berhasil diperbarui untuk costume dengan ID $id.";
    } else {
        return "Gagal memperbarui harga untuk costume dengan ID $id.";
    }

    mysqli_stmt_close($stmt);
}



// Fungsi untuk mendapatkan semua data gambar dari database
public function getAllData() {
    $result = mysqli_query($this->con, "SELECT c.*, d.harga, d.waktu_pembuatan, d.ukuran, d.bahan FROM costume c JOIN detail_costume d ON c.id = d.costume_id");
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}

// Fungsi untuk mendapatkan data gambar berdasarkan ID
public function getDataByID($id) {
    $stmt = mysqli_prepare($this->con, "SELECT * FROM costume WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($result);

    return $data;
}

public function hapusDataByID($id) {
    // Hapus entri terkait dari tabel detail_costume
    $stmt_detail = $this->con->prepare("DELETE FROM detail_costume WHERE costume_id = ?");
    $stmt_detail->bind_param("i", $id);
    $stmt_detail->execute();
    $stmt_detail->close();
    
    // Hapus entri dari tabel costume
    $stmt_costume = $this->con->prepare("DELETE FROM costume WHERE id = ?");
    $stmt_costume->bind_param("i", $id);
    if ($stmt_costume->execute()) {
        return true; // Penghapusan berhasil
    } else {
        return false; // Gagal menghapus data
    }
}


// Fungsi untuk mendapatkan ID terakhir dari tabel "costume"
public function getLastCostumeID() {
    $query = "SELECT id FROM costume ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($this->con, $query);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['id'];
    } else {
        return 0; // Jika tabel kosong, kembalikan ID 0 atau sesuaikan dengan nilai default yang sesuai
    }
}
}
?>
