<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}

	$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."' ");
	$d = mysqli_fetch_object($query);
?>
   <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="favicon.ico"/>
	<title>MulaysStore</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style2.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<header class="header">
    <a href="#" class="logo">
        <img src="logo.png" alt="">
    </a>
    <nav class="navbar">
         <a href="admin.php">beranda</a>
        <a href="editprofil.php">profil</a>
        <a href="pembeli.php">pembeli</a>
        <a href="kategori.php">data kategori</a>
        <a href="data-produk.php">data produk</a>
        <a href="logout.php">logout</a>
    </nav>
  <div class="icons">
    
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>
    </header>
<!-- content -->
	<div class="section">
		<div class="kontener">
			<h3>Profil</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->admin_name ?>" required>
					<input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username ?>" required>
					<input type="text" name="hp" placeholder="No Hp" class="input-control" value="<?php echo $d->admin_telp ?>" required>
					<input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $d->admin_email ?>" required>
					<input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->admin_address ?>" required>
					<input type="submit" name="submit" value="Ubah Profil" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						$nama 	= ucwords($_POST['nama']);
						$user 	= $_POST['user'];
						$hp 	= $_POST['hp'];
						$email 	= $_POST['email'];
						$alamat = ucwords($_POST['alamat']);

						$update = mysqli_query($conn, "UPDATE tb_admin SET 
										admin_name = '".$nama."',
										username = '".$user."',
										admin_telp = '".$hp."',
										admin_email = '".$email."',
										admin_address = '".$alamat."'
										WHERE admin_id = '".$d->admin_id."' ");
						if($update){
							echo '<script>alert("Ubah data berhasil")</script>';
							echo '<script>window.location="editprofil.php"</script>';
						}else{
							echo 'gagal '.mysqli_error($conn);
						}

					}
				?>
			</div>

			<h3>Ubah Password</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
					<input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>
					<input type="submit" name="ubah_password" value="Ubah Password" class="btn">
				</form>
				<?php 
					if(isset($_POST['ubah_password'])){

						$pass1 	= $_POST['pass1'];
						$pass2 	= $_POST['pass2'];

						if($pass2 != $pass1){
							echo '<script>alert("Konfirmasi Password Baru tidak sesuai")</script>';
						}else{

							$u_pass = mysqli_query($conn, "UPDATE tb_admin SET 
										password = '".($pass1)."'
										WHERE admin_id = '".$d->admin_id."' ");
							if($u_pass){
								echo '<script>alert("Ubah data berhasil")</script>';
								echo '<script>window.location="editprofil.php"</script>';
							}else{
								echo 'gagal '.mysqli_error($conn);
							}
						}

					}
				?>
			</div>
		</div>
	</div>
	<section class="footer">
    <div class="links">
          <a href="https://m.facebook.com/muhammad.syalum"class="fab fa-facebook-f"></a>
        <a href="admin.php">beranda</a>
        <a href="https://mobile.twitter.com/MuhamadSyalum" class="fab fa-twitter"></a>
        <a href="editprofil.php">profil</a>
        <a href="https://instagram.com/msyalum" class="fab fa-instagram"></a>
        <a href="pembeli.php">pembeli</a>
        <a href="https://wa.me/6283819181429" class="fab fa-whatsapp"></a>
        <a href="crudadmin.php">admin</a>
        <a href="https://t.me/Syalum" class="fab fa-telegram"></a>
      <a href="logout.php">logout</a>
        </div>

    <div class="credit">created by <span>Muhamad Syalum</span></span> | all rights reserved</div>

</section>
</body>
</html>