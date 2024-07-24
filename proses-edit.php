<?php

include("db.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['submit'])){
	
	// ambil data dari formulir
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$jk = $_POST['jenis_kelamin'];
	$ttl = $_POST['lahir'];
	$agama = $_POST['agama'];
	$sekolah = $_POST['sekolah_asal'];
	
	// buat query update
	$sql = "UPDATE pembeli SET nama='$nama', email='$email' ,alamat='$alamat', jenis_kelamin='$jk', lahir='$ttl', agama='$agama', sekolah_asal='$sekolah' WHERE id=$id";
	$query = mysqli_query($conn, $sql);
	
	// apakah query update berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman list-siswa.php
		header('Location: admin.php');
	} else {
		// kalau gagal tampilkan pesan
		die("Gagal menyimpan perubahan...");
	}
	
	
} else {
	die("Akses dilarang...");
}

?>
