<?php 
    session_start();
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login1.php"</script>';
    }
?>
<?php 

include("db.php");

if( !isset($_GET['id']) ){
	// kalau tidak ada id di query string
	header('Location: pembeli.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM pembeli WHERE id=$id";
$query = mysqli_query($conn, $sql);
$pembeli = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
	die("data tidak ditemukan...");
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
    <style>
        .input-control {
    background: none;
    position: relative;
    display: grid;
    grid-template-columns: 7% 93%;
    margin: 25px 0;
    border-bottom: 2px solid #000;
    padding: 0.5rem 0.7rem;
    font-size: 1.2rem;
    color: #fff;
    font-family: 'poppins', sans-serif;
}
.btn{
display: block;
    width: 100%;
    height: 50px;
    border-radius: 25px;
    outline: none;
    border: none;
    background-image: linear-gradient(to right, #000, #292929, #4e4e4e);
    background-size: 200%;
    font-size: 1.2rem;
    color: #fff;
    padding: 10px;
    font-family: 'Poppins', sans-serif;
    text-transform: uppercase;
    margin: 1rem 0;
    cursor: pointer;
    transition: .5s;
}
.btn:hover{
  color: #f9a602;
    background-position: right;
}
.kontener {
     width: 80%;
    height: 100vh;
    margin: 0 auto;
    grid-template-columns: repeat(2, 1fr);
    grid-gap :7rem;
    padding: 0 20rem;
}
.kontener:after {
    content: '';
    display: block;
    clear: both;
}
.section {
    min-height: 100vh;
    padding:100px 0;
}
.box {
    background-color: #ff0000;
    border:5px solid #000;
    padding:15px;
    box-sizing: border-box;
    margin:10px 0 25px 0;
}
.box:after {
    content: '';
    display: block;
    clear: both;
}
.table{
    min-height: 100vh;
    display: flex;
    background-color: #0000ff;
}
table{ 

    align-items: center;
    border-collapse: collapse;
    background-color: #6ea1cc;
    position: relative;
    margin: auto;
    color: #0000ff;
}
table th,
table td{
    border: 2px solid #000;
    padding: 10px 20px;
}
table thead th{
    background-color: #35a9db;
    color: white;
    border-color: #6ea1cc;
    text-transform: uppercase;
}
table tbody td{
color: #353535;
}
table tbody tr:nth-child(odd)td{
    background-color: #f2f2f2;
}
table tbody tr:hover td{
    background-color: #ffffa2;
    border-color: #ffff0f;
    transition: all .2s;
}
table tfoot th{
    text-align: center;
    background-color: #e5f5ff;
}

    </style>
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
    </header>
    
<div class="section">
		<div class="kontener">
			<h3>Profil Pembeli</h3>
			<div class="box">
				<form action="proses-edit.php" method="POST">
					<input type="hidden" name="id" value="<?php echo $pembeli['id'] ?>" />
					<input type="text" name="nama" placeholder="nama lengkap" class="input-control" value="<?php echo $pembeli['nama'] ?>" required>
					<input type="text" name="email" placeholder="email" class="input-control" value="<?php echo $pembeli['email'] ?>" required>
					<input type="text" name="alamat" placeholder="alamat lengkap" class="input-control" value="<?php echo $pembeli['alamat'] ?>" required>
					<input type="text" name="jenis_kelamin" placeholder="jenis kelmamin" class="input-control" value="<?php echo $pembeli['jenis_kelamin'] ?>" required>
					<input type="date" name="lahir" placeholder="tanggal lahir" class="input-control" value="<?php echo $pembeli['lahir'] ?>" required>
					<input type="text" name="agama" placeholder=" agama" class="input-control" value="<?php echo $pembeli['agama'] ?>" required>
					<input type="text" name="sekolah_asal" placeholder="sekolah asal " class="input-control" value="<?php echo $pembeli['sekolah_asal'] ?>" required>
					<input type="submit" name="submit" value="Ubah Profil" class="btn">
				</form>
</div>
</div>
</div>
 <footer>
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
</footer>
</body>
</html>