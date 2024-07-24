<?php include("db.php");  
    session_start();
    if($_SESSION['status_login_pembeli'] != true){
        echo '<script>window.location="loginn.php"</script>';
    }
    $produk = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($produk);
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
				<input type="search" id="search-box" name="search" placeholder="Cari Produk">
				<input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
				<input type="submit" for="search-box" name="cari" value=" Produk">
			</form>
		</div>
	</div>
    </header>
    
    <section class="pakaian">
    <h1 class="heading">  .</h1>
   <h1 class="heading"> <?php echo $p->nama_produk ?></h1>
    
    <div class="box-container">
        <div class="box">
            <div class="icons">
                <a href="https://wa.me/6283837908623?text=Assalamualaikum%20Admin%20Saya%20Ingin%20Memesan%20<?php echo $p->nama_produk ?>" class="fas fa-shopping-cart"></a>
                <a href="<?php echo $p->foto_produk ?>" class="fas fa-eye"></a>
            </div>
            <div class="content">
            <div class="price">Rp. <?php echo number_format($p->harga_produk) ?></div></div>

            <div class="image">
            <img src="produk/<?php echo $p->foto_produk ?>" >
</div>
<div class="content">
<div class="box">
                <h3>Deskripsi :<br>
						<?php echo $p->deskripsi_produk ?>
</h3>
</div>
</div>
        </div>
    </div>
</div>
    </section>
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
