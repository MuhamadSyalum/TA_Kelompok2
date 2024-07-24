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
     
    <link rel="stylesheet" href="css/style.css">


</head>
<body>
	<!-- header -->
	

	<!-- content -->
	<section class="table">
    <table>
    <thead>
        <tr>
            <th colspan="4"><h1>data Kategori MulaysStore</h1></th>
        </tr>
        <tr>
            <th width="60px">No</th>
            <th><h1>Nama</h1></th>
            <th><h1>Ikon</h1></th>
             <th><h1>tindakan</h1></th>
            
            
        </tr>
    </thead>
					<tbody>
					<?php
 $no = 1;
        $sql = "SELECT * FROM kategori";
        $query = mysqli_query($conn, $sql);
        
        while($k = mysqli_fetch_array($query)){
            echo "<tr>";
            
            echo "<td><h1>".$no++. "</h1></td>";
            echo "<td><h1>".$k['nama']."</h1></td>";
            echo "<td><h1>".$k['icon']."</h1></td>";
           
            
                
            echo "<td>";
            echo "<a href='edit-kategori.php?id=".$k['id_kategori']."'><h1>Edit</h1></a> | ";
            echo "<a href='proses-hapus.php?id=".$k['id_kategori']."'><h1>Hapus</h1></a>";
            echo "</td>";
            
            echo "</tr>";
        }       
        ?>
					</tbody>
					<tfoot>
        <tr>
            <th colspan="4"><a href="tambah-kategori.php"><h1>tambah kategori</h1></a></th>
        </tr>
        <tr>
            <th colspan="4"><h1>Total: <?php echo mysqli_num_rows($query) ?></h1></th>
        </tr>
    </tfoot>
				</table>
	</section>
	<footer>
    <section class="footer">
    <div class="links">
    <a href="admin.php">beranda</a>
          <a href="https://m.facebook.com/muhammad.syalum"class="fab fa-facebook-f"></a>
          <a href="editprofil.php">profil</a>
        <a href="https://mobile.twitter.com/MuhamadSyalum" class="fab fa-twitter"></a>
        <a href="pembeli.php">pembeli</a>
        <a href="https://instagram.com/msyalum" class="fab fa-instagram"></a>
        <a href="data-produk.php">data produk</a>
        <a href="https://wa.me/6283819181429" class="fab fa-whatsapp"></a>
        <a href="kategori.php">data kategori</a>
        <a href="https://t.me/Syalum" class="fab fa-telegram"></a>
      <a href="logout.php">logout</a>
        </div>

    <div class="credit">created by <span>Muhamad Syalum</span></span> | all rights reserved</div>

</section>
</footer>
</body>
</html>