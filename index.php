<?php include("db.php");  
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
    <a href="index.php">Beranda</a>
        <a href="#kategori">kategori</a>
        <a href="#menu">produk</a>
        <a href="#review">review</a>
        <a href="#share">kontak</a>
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
				<input type="search" id="search-box" name="search" placeholder="Cari Produk">
				<input type="submit" for="search-box" name="cari" value="Cari Produk">
			</form>
		</div>
	</div>
    </header>
    <section class="home" id="home">
    <div class="content">
        <h3>halo <?php echo $_SESSION['a_globall']->nama ?> SELAMAT BERBELANJA</h3>
        <p>Awali harimu dengan berbelanja di toko kami</p>
        <a href="#menu" class="btn">Selamat datang di Daifukumoy</a>
    </div>

</section>
	<section class="about" id="about">
		<div class="container">
        <h1 class="heading">
        <span>T</span>
        <span>e</span>
        <span>n</span>
        <span>t</span>
        <span>a</span>
        <span>n</span>
        <span>g</span>
        <br>
        <span>K</span>
        <span>a</span>
        <span>m</span>
        <span>i</span>
    </h1>
			<p> Daifukumoy adalah toko mochi Korea yang menawarkan berbagai macam mochi lezat dengan rasa unik dan menarik. Mochi Daifukumoy terbuat dari bahan-bahan berkualitas tinggi dan dibuat dengan penuh kasih sayang. Rasakan kelembutan dan sensasi rasa yang luar biasa dari mochi Daifukumoy. Tersedia dalam berbagai macam rasa, Daifukumoy adalah pilihan tepat untuk para pecinta rasa manis dan ingin mencoba sesuatu yang baru. </p>
		</div>
	</section>
		<section class="kategori" id="kategori">
		<div class="container">
        <h1 class="heading">
        <span>K</span>
        <span>a</span>
        <span>t</span>
        <span>e</span>
        <span>g</span>
        <span>o</span>
        <span>r</span>
        <span>i</span>
    </h1>
			<div class="box">
                <?php 
					$kategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY id_kategori DESC");
					if(mysqli_num_rows($kategori) > 0){
						while($k = mysqli_fetch_array($kategori)){
				?>
                
					<a href="produk.php?kat=<?php echo $k['id_kategori'] ?>">
                    <div class="col-4">
                    <div class="icon"><i class="<?php echo $k['icon'] ?>"></i></div>
							<h4><?php echo $k['nama'] ?></h4>
                            </div>
                    </a>
                    
                    
				<?php }}else{ ?>
					<p>Kategori tidak ada</p>
				<?php } ?>
				</div>
                </div>
	</section>
	<section class="menu" id="menu">
    <h1 class="heading">
        <span>P</span>
        <span>r</span>
        <span>o</span>
        <span>d</span>
        <span>u</span>
        <span>k</span>
        <br>
        <span>K</span>
        <span>a</span>
        <span>m</span>
        <span>i</span>
    </h1>
    <div class="box-container">
        <?php 
					$produk = mysqli_query($conn, "SELECT * FROM produk WHERE status_produk = 1 ORDER BY id_produk DESC LIMIT 8");
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
					<p>Produk tidak ada</p>
				<?php } ?>
             </div>
             <a href="produk.php" class="btn">Lihat Lebih Banyak</a>
        </section>
       
<section class="review" id="review">
    <h1 class="heading">
        <span>R</span>
        <span>e</span>
        <span>v</span>
        <span>i</span>
        <span>e</span>
        <span>w</span>
    </h1>

    <div class="swiper-container review-slider">
 
        <div class="swiper-wrapper">
        <?php 
                    $review = mysqli_query($conn, "SELECT * FROM saran ORDER BY id_saran DESC");
                    if(mysqli_num_rows($review) > 0){
                        while($s = mysqli_fetch_array($review)){
                ?>
            <div class="swiper-slide">

                <div class="box">
                    <img src="saran/<?php echo $s['gambar'] ?>" alt="">
                    <h3><?php echo $s['nama'] ?></h3>
                    <p><?php echo $s['deskripsi'] ?></p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>


        </div>
 <?php }}else{ ?>
                    <h2>Saran tidak ada</h2>
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
        <a href="#kategori">kategori</a>
        <a href="#menu">produk</a>
        <a href="#review">review</a>
        <a href="#share">kontak</a>
        <a href="logout2.php">logout</a>
    </div>

    <div class="credit">created by <span>Kelompok2</span></span> | all rights reserved</div>

</section>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="script.js"></script>
<script type="text/javascript"> 
</script>
</body>
</html>