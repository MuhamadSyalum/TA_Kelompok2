<?php include("db.php");  
    session_start();
    if($_SESSION['status_login_pembeli'] != true){
        echo '<script>window.location="loginn.php"</script>';
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
<form action="tambah-saran.php" method="POST" enctype="multipart/form-data"> <img src="img/logo.svg">
            <h2 class="title">Tambah Produk</h2>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-book"></i>
                 </div>
                 <div class="div">
                    <h5>Masukkan nama</h5>
                    <input type="text" name="nama" class="input">
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
           <input type="submit" class="btn" name="submit" value="tambah" />
          <div class="signup">
             <a href="index.php" class="teks"><p align ="right">Kembali</p></a>
            </div>
            </div>
                        </form>

    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>