<?php

include("db.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['TAMBAH'])){
  
  // ambil data dari formulir
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $alamat = $_POST['alamat'];
  $jk = $_POST['jenis_kelamin'];
  $ttl = $_POST['lahir'];
  $agama = $_POST['agama'];
  $sekolah = $_POST['sekolah_asal'];
  
  
  
  
  
  // buat query
  $sql = "INSERT INTO pembeli (nama, email, password, alamat, jenis_kelamin, lahir, agama, sekolah_asal) VALUE ('$nama', '$email', '$pass', '$alamat', '$jk', '$ttl', '$agama', '$sekolah' )";
  $query = mysqli_query($conn, $sql);
  
  // apakah query simpan berhasil?
  if( $query ) {
    // kalau berhasil alihkan ke halaman index.php dengan status=sukses
    header('Location: admin.php?status=sukses');
  } else {
    // kalau gagal alihkan ke halaman indek.ph dengan status=gagal
    header('Location: admin.php?status=gagal');
  }
  
  
} else {
  die("Akses dilarang...");
}

?>
