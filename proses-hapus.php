<?php 
	
	include 'db.php';

	if(isset($_GET['idk'])){
		$delete = mysqli_query($conn, "DELETE FROM kategori WHERE id_kategori = '".$_GET['idk']."' ");
		echo '<script>window.location="kategori.php"</script>';
	}

	if(isset($_GET['idp'])){
		$produk = mysqli_query($conn, "SELECT foto_produk FROM produk WHERE id_produk = '".$_GET['idp']."' ");
		$p = mysqli_fetch_object($produk);

		unlink('./produk/'.$p->foto_produk);

		$delete = mysqli_query($conn, "DELETE FROM produk WHERE id_produk = '".$_GET['idp']."' ");
		echo '<script>window.location="data-produk.php"</script>';
	}

?>