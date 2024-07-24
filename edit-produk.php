<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}

	$produk = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '".$_GET['id']."' ");
	if(mysqli_num_rows($produk) == 0){
		echo '<script>window.location="data-produk.php"</script>';
	}
	$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="favicon.ico"/>
	<title>MulaysStore</title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="dashboard.php">MulaysStore</a></h1>
			<ul>
				<li><a href="admin.php">beranda</a></li>
        <li><a href="editprofil.php">profil</a></li>
        <li><a href="pembeli.php">pembeli</a></li>
        <li><a href="kategori.php">data kategori</a></li>
        <li><a href="data-produk.php">data produk</a></li>
        <li><a href="logout.php">logout</a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Edit Data Produk</h3>
			<div class="box">
				<form action="" method="POST" enctype="multipart/form-data">
					<select class="input-control" name="kategori" required>
						<option value="">--Pilih--</option>
						<?php 
							$kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY id_kategori DESC");
							while($r = mysqli_fetch_array($kategori)){
						?>
						<option value="<?php echo $r['id_kategori'] ?>" <?php echo ($r['id_kategori'] == $p->id_kategori)? 'selected':''; ?>><?php echo $r['nama'] ?></option>
						<?php } ?>
					</select>

					<input type="text" name="nama" class="input-control" placeholder="Nama Produk" value="<?php echo $p->nama_produk ?>" required>
					<input type="text" name="harga" class="input-control" placeholder="Harga" value="<?php echo $p->harga_produk ?>" required>
					
					<img src="produk/<?php echo $p->foto_produk ?>" width="100px">
					<input type="hidden" name="foto" value="<?php echo $p->foto_produk ?>">
					<input type="file" name="gambar" class="input-control">
					
					
					<textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?php echo $p->deskripsi_produk ?></textarea><br>
					<select class="input-control" name="status">
						<option value="">--Pilih--</option>
						<option value="1" <?php echo ($p->status_produk == 1)? 'selected':''; ?>>Aktif</option>
						<option value="0" <?php echo ($p->status_produk == 0)? 'selected':''; ?>>Tidak Aktif</option>
					</select>
					<input type="submit" name="submit" value="Submit" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						// data inputan dari form
						$kategori 	= $_POST['kategori'];
						$nama 		= $_POST['nama'];
						$harga 		= $_POST['harga'];
						$deskripsi 	= $_POST['deskripsi'];
						$status 	= $_POST['status'];
						$foto 	 	= $_POST['foto'];
						// data gambar yang baru
						$filename = $_FILES['gambar']['name'];
						$tmp_name = $_FILES['gambar']['tmp_name'];
						

						

						// jika admin ganti gambar
						if($filename  != ''){
							$type1 = explode('.', $filename);
							$type2 = $type1[1];
							
							$newname = 'produk'.time().'.'.$type2;
							

							// menampung data format file yang diizinkan
							$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

							// validasi format file
							if(!in_array($type2, $tipe_diizinkan)){
								// jika format file tidak ada di dalam tipe diizinkan
								echo '<script>alert("Format file tidak diizinkan")</scrtip>';

							}else{
								unlink('./produk/'.$foto );
								move_uploaded_file($tmp_name ,'./produk/'.$newname );
								$namagambar = $newname;
								

							}

						}else{
							// jika admin tidak ganti gambar
							$namagambar = $foto;
							
							
						}

						
						// query update data produk
						$update = mysqli_query($conn, "UPDATE produk SET 
												id_kategori = '".$kategori."',
												nama_produk = '".$nama."',
												harga_produk = '".$harga."',
												deskripsi_produk = '".$deskripsi."',
												foto_produk = '".$namagambar."',
												status_produk = '".$status."'
												WHERE id_produk = '".$p->id_produk."'	");
						if($update){
							echo '<script>alert("Ubah data berhasil")</script>';
							echo '<script>window.location="data-produk.php"</script>';
						}else{
							echo 'gagal '.mysqli_error($conn);
						}
						
					}
				?>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2024 - MulaysStore.</small>
		</div>
	</footer>
	<script>
        CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>