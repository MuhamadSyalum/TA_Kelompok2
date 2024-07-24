<?php 
    session_start();
    include 'db.php';
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
    <link rel="stylesheet" type="text/css" href="style.css">
   
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!-- header -->
    
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

    <div class="search-form">
        <label for="search-box" class="fas fa-search"></label>
    </div>
    </header>
    <section class="home" id="home">
    <div class="content">
        <h3>HALO <?php echo $_SESSION['a_global']->admin_name ?> SELAMAT DATANG DI TAMPILAN ADMIN</h3>
        <p>Tampilan Admin Sederhana</p>
        <p>selamat datang di MulaysStore</p>
    </div>
</section>
<section class="footer">

    <div class="credit">created by <span>Muhamad Syalum</span></span> | all rights reserved</div>

</section>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="script.js"></script>

</body>
</html>