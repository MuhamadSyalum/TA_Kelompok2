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
	 <title>MulaysStore</title>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     <link rel="stylesheet" href="css/stylelogin.css">


</head>
<body>
    
  <img class="wave" src="img/wave.png">
    <div class="container">
        <div class="img">
            <img src="img/logo.svg">
        </div>
        <div class="login-content">
        <form action="" method="POST">
                <img src="img/logo.svg">
            <h2 class="title">Tambah Kategori</h2>
             <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-shopping-cart"></i>
                 </div>
                 <div class="div">
                    <h5>Nama Kategori</h5>
                    <input type="text" name="nama" class="input">
                 </div>
              </div>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-icons"></i>
                 </div>
                 <div class="div">
                    <h5>ikon Kategori</h5>
                    <input type="text" name="icon" class="input">
                 </div>
              </div>
              <input type="submit" class="btn" name="submit" value="tambah" />
            <div class="signup">
			 <a href="kategori.php" class="teks"><p align ="right">Kembali</p></a>
            </div>
            </div>
            </form>
	
				<?php 
					if(isset($_POST['submit'])){

						$nama = ucwords($_POST['nama']);
						$icon = $_POST['icon'];

						$insert = mysqli_query($conn, "INSERT INTO kategori VALUES (
											null,
											'".$nama."',
											'".$icon."') ");
						if($insert){
							echo '<script>alert("Tambah data berhasil")</script>';
							echo '<script>window.location="kategori.php"</script>';
						}else{
							echo 'gagal '.mysqli_error($conn);
						}

					}
				?>
	</div>

	
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>