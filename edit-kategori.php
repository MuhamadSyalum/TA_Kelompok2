<?php 
	include("db.php");  
    session_start();
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login1.php"</script>';
    }

	$kategori = mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori = '".$_GET['id']."' ");
	if(mysqli_num_rows($kategori) == 0){
		echo '<script>window.location="kategori.php"</script>';
	}
	$k = mysqli_fetch_object($kategori);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MulaysStore</title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
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
			<h3>Edit Data Kategori</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="text" name="nama" placeholder="Nama Kategori" class="input-control" value="<?php echo $k->nama ?>" required>
					<input type="text" name="icon" placeholder="Ikon Kategori" class="input-control" value="<?php echo $k->icon ?>" required>
					<input type="submit" name="submit" value="Submit" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						$nama = ucwords($_POST['nama']);
						$icon = $_POST['icon'];

						$update = mysqli_query($conn, "UPDATE kategori SET 
												nama = '".$nama."',
												icon = '".$icon."'
												WHERE id_kategori = '".$k->id_kategori."'	");

						if($update){
							echo '<script>alert("Edit data berhasil")</script>';
							echo '<script>window.location="kategori.php"</script>';
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
</body>
</html>