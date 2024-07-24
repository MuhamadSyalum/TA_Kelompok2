<?php   
error_reporting(0);
include("db.php");
    session_start();
    if($_SESSION['status_login_pembeli'] != true){
        echo '<script>window.location="loginn.php"</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="shortcut icon" href="favicon.ico"/>
    <title>MulaysStore</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script type ="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
</head>
<body>
<header class="header">
    <a href="#" class="logo">
        <img src="logo.png" alt="">
    </a>
    <nav class="navbar">
    <a href="index.php">kategori</a>
        <a href="produk.php">produk</a>
        <a href="index.php">review</a>
        <a href="index.php">kontak</a>
        <a href="logout2.php">logout</a>
    </nav>
    <div class="icons">
    <div class="fas fa-search" id="search-btn"></div>
        <div class="fas fa-shopping-cart" id="cart-btn"></div>
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <div class="search-form">
		<div class="container">
			<form action="produk.php">
				<input type="search" id="search-box" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>" >
				<input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
				<input type="submit" for="search-box" name="cari" value=" Produk">
			</form>
		</div>
	</div>
    </header>


    <section class="menu">
        <h1 class="heading">.</h1>
        <div class="box-container">
            
        <?php 
					if($_GET['search'] != '' || $_GET['kat'] != ''){
						$where = "AND nama_produk LIKE '%".$_GET['search']."%' AND id_kategori LIKE '%".$_GET['kat']."%' ";
					}
                    $produk = mysqli_query($conn, "SELECT * FROM produk WHERE status_produk = 1 $where ORDER BY id_produk DESC");
					if(mysqli_num_rows($produk) > 0){
						while($p = mysqli_fetch_array($produk)){
				?>	
              <a href="detail-produk.php?id=<?php echo $p['id_produk'] ?>">
              <div class="box">
							<img src="produk/<?php echo $p['foto_produk'] ?>">
							<h3><?php echo substr($p['nama_produk'], 0, 30) ?></h3>
							<div class="price">Rp. <?php echo number_format($p['harga_produk']) ?></div>
                            </div>
					</a>
				<?php }}else{ ?>
					<h1>Produk Tidak Ada</h1>
				<?php } ?>
                
            </div>
            </section>
            <section class="footer">
    <div class="share" id="share">
        <a href="https://m.facebook.com/muhammad.syalum"class="fab fa-facebook-f"></a>
        <a href="https://mobile.twitter.com/MuhamadSyalum" class="fab fa-twitter"></a>
        <a href="https://instagram.com/msyalum" class="fab fa-instagram"></a>
        <a href="https://wa.me/6283819181429" class="fab fa-whatsapp"></a>
        <a href="https://t.me/Syalum" class="fab fa-telegram"></a>
    </div>
    <div class="links">
    <a href="index.php">kategori</a>
        <a href="produk.php">produk</a>
        <a href="index.php">review</a>
        <a href="index.php">kontak</a>
        <a href="logout2.php">logout</a>
    </div>

    <div class="credit">created by <span>Muhamad Syalum</span></span> | all rights reserved</div>

</section>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="script.js"></script>
<script type="text/javascript"> 
</script>
</body>
</html>