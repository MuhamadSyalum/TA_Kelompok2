<?php include("db.php");  
    session_start();
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login1.php"</script>';
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="favicon.ico"/>
	<title>MulaysStore</title>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     <link rel="stylesheet" href="css/stylelogin.css">
<body>
<img class="wave" src="img/wave.png">
    <div class="container">
        <div class="img">
            <img src="img/logo.svg">
        </div>
        <div class="login-content">
<form action="" method="POST" enctype="multipart/form-data">
                <img src="img/logo.svg">
            <h2 class="title">Tambah Produk</h2>
            <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-shopping-cart"></i>
                 </div>
            <select name="kategori" required>
						<option value="">--Pilih--</option>
						<?php 
							$kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY id_kategori DESC");
							while($r = mysqli_fetch_array($kategori)){
						?>
						<option value="<?php echo $r['id_kategori'] ?>"><?php echo $r['nama'] ?></option>
						<?php } ?>
					</select>
				</div>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-book"></i>
                 </div>
                 <div class="div">
                    <h5>Nama Produk</h5>
                    <input type="text" name="nama" class="input">
                 </div>
              </div>
                  <div class="input-div two">
                 <div class="i">
                    <i class="fas fa-money-bill"></i>
                 </div>
                 <div class="div">
                    <h5>masukkan Harga</h5>
                    <input type="text" name="harga" class="input">
                 </div>
              </div>
              <div class="input-div two">
                 <div class="i">
                    <i class="fas fa-image"></i>
                 </div>
                 <div class="div">
                    <h5> Foto</h5>
                    <input type="file" name="gambar" class="input">
                 </div>
              </div>
               <div class="input-div two">
                 <div class="i">
                    <i class="fas fa-newspaper"></i>
                 </div>
                 <div class="div">
                    <h5>masukkan deskripsi</h5>
                    <input type="textarea" name="deskripsi" class="input">
                 </div>
              </div>
               <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-chart-bar"></i>
                 </div>
            <select class="input-control" name="status">
						<option value="">--Pilih--</option>
						<option value="1">Aktif</option>
						<option value="0">Tidak Aktif</option>
					</select>
				</div>

           <input type="submit" class="btn" name="submit" value="tambah" />
          <div class="signup">
			 <a href="kategori.php" class="teks"><p align ="right">Kembali</p></a>
            </div>
            </div>
                        </form>

	<!-- content -->
	
				<?php 
					if(isset($_POST['submit'])){

						// print_r($_FILES['gambar']);
						// menampung inputan dari form
						$kategori 	= $_POST['kategori'];
						$nama 		= $_POST['nama'];
						$harga 		= $_POST['harga'];
						$deskripsi 	= $_POST['deskripsi'];
						$status 	= $_POST['status'];

						// menampung data file yang diupload
						$filename = $_FILES['gambar']['name'];
						$tmp_name = $_FILES['gambar']['tmp_name'];

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
							// jika format file sesuai dengan yang ada di dalam array tipe diizinkan
							// proses upload file sekaligus insert ke database
							move_uploaded_file($tmp_name, './produk/'.$newname);

							$insert = mysqli_query($conn, "INSERT INTO produk VALUES (
										null,
										'".$kategori."',
										'".$nama."',
										'".$harga."',
										'".$deskripsi."',
										'".$newname."',
										'".$status."',
										0
											) ");

							if($insert){
								echo '<script>alert("Tambah data berhasil")</script>';
								echo '<script>window.location="data-produk.php"</script>';
							}else{
								echo 'gagal '.mysqli_error($conn);
							}

						}

						
						
					}
				?>
			</div>

    <script type="text/javascript" src="js/main.js">CKEDITOR.replace( 'deskripsi' );</script>
</body>
</html>