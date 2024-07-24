<?php include("db.php");  
    session_start();
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
     <link rel="stylesheet" href="css/stylelogin.css">


</head>
<body>
    
  

<img class="wave" src="img/wave.png">
    <div class="container">
        <div class="img">
            <img src="img/logo.svg">
        </div>
        <div class="login-content">
            <form action="proses-tambah.php" method="POST">
                <img src="img/logo.svg">
            <h2 class="title">TAMBAH Pembeli</h2>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5>Username</h5>
                    <input type="text" name="nama" class="input">
                 </div>
              </div>
                  <div class="input-div two">

                 <div class="i">

                    <i class="fas fa-envelope"></i>
                 </div>
                 <div class="div">
                    <h5>masukkan email</h5>
                    <input type="email" name="email" class="input">
                 </div>
              </div>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-map-marker"></i>
                 </div>
                 <div class="div">
                    <h5>Alamat</h5>
                    <input type="text" name="alamat" class="input">
                 </div>
              </div>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5>jenis kelamin</h5>
                    <input type="text" name="jenis_kelamin" class="input">
                 </div>
              </div>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-birthday-cake"></i>
                 </div>
                 <div class="div">
        
                    <input type="date" name="lahir" class="input">
                 </div>
              </div>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-group"></i>
                 </div>
                 <div class="div">
                    <h5>Agama</h5>
                    <input type="text" name="agama" class="input">
                 </div>
              </div>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-schoool"></i>
                 </div>
                 <div class="div">
                    <h5>asal sekolah</h5>
                    <input type="text" name="sekolah_asal" class="input">
                 </div>
              </div>
              <div class="input-div pass">
                 <div class="i"> 
                    <i class="fas fa-lock"></i>
                 </div>
                 <div class="div">
                    <h5>Password</h5>
                    <input type="password" name="password" class="input">
                 </div>
              </div>
           <input type="submit" class="btn" name="TAMBAH" value="tambah" />
            <input type="submit" class="btn"  value="Kembali" onclick="history.back()">
            </div>
            </form>
        </div>
        
    </div>
  
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>