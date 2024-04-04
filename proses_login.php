<?php

$nik           = $_POST['nik'];
$nama_lengkap  = $_POST['nama_lengkap'];

$format = "$nik|$nama_lengkap";
$file   = file('config.txt',FILE_IGNORE_NEW_LINES);
if(in_array($format, $file)){   //jika data ditemukan
    session_start();
    $_SESSION['nik'] = $nik;
    $_SESSION['nama_lengkap'] = $nama_lengkap;

    header("Location:tampilan.php");

}else{  //Jika data tidak ditemukan ?>
    <script type="text/javascript">window
        alert('Password Atau Nama Lengkap Yang Anda Masukkan Salah');
        window.location.assign('index.php');
    </script>
<?php }