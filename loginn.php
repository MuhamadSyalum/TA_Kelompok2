<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="favicon.ico"/>
    
	<title>MulaysLogin</title>
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
				<h2 class="title">Masuk Pembeli</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Masukkan email</h5>
           		   		<input type="email" name="name" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="pass" class="input">
            	   </div>
            	</div>
            <input type="submit" name="submit" value="Masuk" class="btn">
          <?php 
      if(isset($_POST['submit'])){
        session_start();
        include 'db.php';

        $user = mysqli_real_escape_string($conn, $_POST['name']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);

        $cek = mysqli_query($conn, "SELECT * FROM pembeli WHERE email = '".$user."' AND password = '".$pass."'");
        if(mysqli_num_rows($cek) > 0){
          $d = mysqli_fetch_object($cek);
          $_SESSION['status_login_pembeli'] = true;
          $_SESSION['a_globall'] = $d;
          $_SESSION['idd'] = $d->id;
          echo '<script>window.location="index.php"</script>';
        }else{
          echo '<script>alert("Username atau password Anda salah!")</script>';
        }

      }
    ?>
             <div class="signup">
			 <a href="pass.html" class="teks"><p align ="left">Masuk Admin</p></a>
              <a href="login.php" class="teks"><p align ="left">Belum punya akun</p></a>
            </div>
            </form>
        </div>
        
    </div>
    
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
