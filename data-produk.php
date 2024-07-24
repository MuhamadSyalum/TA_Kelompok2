<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login1.php"</script>';
	}
?>
<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="favicon.ico"/>
   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MulaysStore</title>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     
    <link rel="stylesheet" href="css/style.css">


</head>
<body>
	<!-- header -->
	

	<!-- content -->
	<section class="table">
    <table>
    <thead>
        <tr>
            <th colspan="7"><h1>data Produk MulaysStore</h1></th>
        </tr>
        <tr>
            <th width="60px">No</th>
            <th><h1>Kategori</h1></th>
            <th><h1>Nama Produk</h1></th>
             <th><h1>Harga</h1></th>
			 <th><h1>Gambar</h1></th>
            <th><h1>Status</h1></th>
             <th><h1>Aksi</h1></th>
            
            
        </tr>
    </thead>
					<tbody>
						<?php
							$no = 1;
							$produk = mysqli_query($conn, "SELECT * FROM produk LEFT JOIN kategori USING (id_kategori) ORDER BY id_produk DESC");
							if(mysqli_num_rows($produk) > 0){
							while($row = mysqli_fetch_array($produk)){
						?>
						<tr>
							<th><h1><?php echo $no++ ?></h1></th>
							<th><h1><?php echo $row['nama'] ?></h1></th>
							<th><h1><?php echo $row['nama_produk'] ?></h1></th>
							<th><h1>Rp. <?php echo number_format($row['harga_produk']) ?></h1></th>
							<th><h1><a href="produk/<?php echo $row['foto_produk'] ?>" target="_blank"> <img src="produk/<?php echo $row['foto_produk'] ?>" width="50px"> </a></h1></th>
							<th><h1><?php echo ($row['status_produk'] == 0)? 'Tidak Aktif':'Aktif'; ?></h1></th>
							<th><h1>
								<a href="edit-produk.php?id=<?php echo $row['id_produk'] ?>">Edit</a> || <a href="proses-hapus.php?idp=<?php echo $row['id_produk'] ?>" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
							</h1></th>
						</tr>
						<?php }}else{ ?>
							<tr>
								<th colspan="7"><h1>Tidak ada data</h1></th>
							</tr>
						<?php } ?>
					</tbody>
					<tfoot>
        <tr>
            <th colspan="7"><a href="tambah-produk.php"><h1>tambah kategori</h1></a></th>
        </tr>
        <tr>
            <th colspan="7"><h1>Total: <?php echo mysqli_num_rows($produk) ?></h1></th>
        </tr>
    </tfoot>
				</table>
	</section>
	<footer>
    <section class="footer">
    <div class="links">
    <a href="admin.php">beranda</a>
          <a href="https://m.facebook.com/muhammad.syalum"class="fab fa-facebook-f"></a>
          <a href="editprofil.php">profil</a>
        <a href="https://mobile.twitter.com/MuhamadSyalum" class="fab fa-twitter"></a>
        <a href="pembeli.php">pembeli</a>
        <a href="https://instagram.com/msyalum" class="fab fa-instagram"></a>
        <a href="data-produk.php">data produk</a>
        <a href="https://wa.me/6283819181429" class="fab fa-whatsapp"></a>
        <a href="kategori.php">data kategori</a>
        <a href="https://t.me/Syalum" class="fab fa-telegram"></a>
      <a href="logout.php">logout</a>
        </div>

    <div class="credit">created by <span>Muhamad Syalum</span></span> | all rights reserved</div>

</section>
</footer>
</body>
</html>