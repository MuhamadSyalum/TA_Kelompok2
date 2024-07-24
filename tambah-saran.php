   <?php
include("db.php");

                    if(isset($_POST['submit'])){
                        $nama       = $_POST['nama'];
                        $deskripsi  = $_POST['deskripsi'];
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];
                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];
                        $newname = 'saran'.time().'.'.$type2;
                        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');
                        if(!in_array($type2, $tipe_diizinkan)){
                            echo '<script>alert("Format file tidak diizinkan")</scrtip>';
                        }else{
                            move_uploaded_file($tmp_name, './saran/'.$newname);
                            $sql = "INSERT INTO saran (nama, gambar, deskripsi) VALUE ('$nama', '$newname', '$deskripsi')";
  $query = mysqli_query($conn, $sql);
                            if( $query ) {
    header('Location: index.php?status=sukses');
  } else {
    header('Location: saran.php?status=gagal');
  }
} 
}
                ?>