<?php
include 'db.php';
$namaErr = $emailErr = $jenis_kelaminErr = $alamatErr = $passwordErr = "";
$nama = $email = $jenis_kelamin = $alamat = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nama"])) {
    $namaErr = "nama Tidak boleh kosong";
  } else {
    $nama = test_input($_POST["nama"]);
    // check if nama only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
      $namaErr = "Hanya Boleh diisi dengan Huruf"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email Tidak boleh kosong";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "format email salah"; 
        if (empty($_POST["email"])) {
    $emailErr = "Email Tidak boleh kosong";
  } 
}
 }
  if (empty($_POST["alamat"])) {
    $alamatErr = "alamat Tidak boleh kosong";
  } else {
    $alamat = test_input($_POST["alamat"]);
    // check if alamat only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$alamat)) {
      $alamatErr = "Tuliskan nama Kotanya saja"; 
    }
  }
 
  if (empty($_POST["jenis_kelamin"])) {
    $jenis_kelaminErr = "jenis kelamin Tidak boleh kosong";
  } else {
    $jenis_kelamin = test_input($_POST["jenis_kelamin"]);
    // check if jenis_kelamin only contains letters and whitespace
    if (!preg_match("/[a-zA-Z ]*$/",$jenis_kelamin)) {
      $jenis_kelaminErr = "Tulis saja Perempuan atau Laki Laki"; 
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "password Tidak boleh kosong";
  } else {
    $password = test_input($_POST["password"]);
 
  }
  $pembeli = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pembeli WHERE nama='$nama' or email='$email' "));
  if ($pembeli > 0){
  echo "<script>window.alert('nama atau email yang anda masukan sudah ada')
  window.location='index.php'</script>";
  }else {
  
  if (empty($namaErr) && empty($emailErr) && empty($jenis_kelaminErr) && empty($passwordErr)) {
    $sql = "INSERT INTO pembeli (nama, email, password, alamat, jenis_kelamin) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nama, $email, $password, $alamat, $jenis_kelamin);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
      // Redirect to login page
      header("Location: loginn.php?status=sukses");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
  }
}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="favicon.ico"/>
   <title>MulaysLogin</title>
   <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
   <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
   <style>
    .kontener{
      margin: 370px 190px 200px 200px;
 padding: 150px;
 position: absolute;
 right: -90px;
    }
   #message {
	display:none;
	background: transparent;
	color: #000;
	position: relative;
	padding: 20px;
	margin-top: 10px;
  }
  
  #message p {
	padding: 10px 35px;
	font-size: 18px;
  }
  
  /* Add a green text color and a checkmark when the requirements are right */
  .valid {
	color: #0000cd;
  }
  
  .valid:before {
	position: relative;
	right: 35px;
	
  }
  
  /* Add a red text color and an "x" icon when the requirements are wrong */
  .invalid {
	color: red;
  }
  
  .invalid:before {
	position: relative;
	right: 35px;
	
  }
  </style>
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
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <img src="img/logo.svg">
         <h2 class="title">Daftar Pembeli</h2>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5>Username</h5>
                    <input type="text" name="nama" class="input">
                    <span class="error"><?php echo $namaErr;?></span>
                 </div>
              </div>
                  <div class="input-div two">

                 <div class="i">

                    <i class="fas fa-envelope"></i>
                 </div>
                 <div class="div">
                    <h5>masukkan email</h5>
                    <input type="email" name="email" class="input">
                    <span class="error"><?php echo $emailErr;?></span>
                 </div>
              </div>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-map-marker"></i>
                 </div>
                 <div class="div">
                    <h5>Alamat</h5>
                    <input type="text" name="alamat" class="input">
                    <span class="error"><?php echo $alamatErr;?></span>
                 </div>
              </div>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5>Jenis Kelamin</h5>
                    <input type="text" name="jenis_kelamin" class="input">
                    <span class="error"><?php echo $jenis_kelaminErr;?></span>
                 </div>
              </div>
              <div class="input-div pass">
                 <div class="i"> 
                    <i class="fas fa-lock"></i>
                 </div>
                     <div class="div"> 
                        <h5>masukkan password</h5> 
                        <input type="password" id="password"name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="input"> 
                        <span class="error"><?php echo $passwordErr;?></span>
                     </div> 
                  </div> 
                  <input type="submit" class="btn" value="Daftar"> 
                 
                </form> 
                
      </div>
      <div class="kontener">
      <div id="message">
  <h3>Passowrd Harus Ada:</h3>
  <p id="letter" class="invalid"> <b>Huruf</b> Kecil</p>
  <p id="capital" class="invalid"> <b>Huruf</b> kapital</p>
  <p id="number" class="invalid"> <b>nomber</b></p>
  <p id="length" class="invalid">Minimal <b>8 karakter</b></p>
</div>
<div>
      
                <script type="text/javascript" src="js/main.js"></script>
                <script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
             </body> 
             </html>
            