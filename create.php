<?php 
   include('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CREATE</title>
</head>

<body>
   <a href="read.php">KEMBALI KE READ</a>

   <H1>CREATE</H1>
   <form action="" method="POST" enctype="multipart/form-data">
      <table>
         <tr>
            <th>Nama Barang</th>
            <td><input type="text" name="nama"></td>
         </tr>
         <tr>
            <th>Harga Barang</th>
            <th><input type="text" name="harga"></th>
         </tr>
         <tr>
            <th>Jenis Barang</th>
            <th><input type="text" name="jenis"></th>
         </tr>
         <tr>
            <th>Stock Barang</th>
            <th><input type="text" name="stock"></th>
         </tr>
         <tr>
            <th>Gambar Barang</th>
            <th><input type="file" name="gambar"></th>
         </tr>
      </table>
      <input type="submit" name="submit">
   </form>
   <?php 
      if(isset($_POST['submit'])){
         $nama = $_POST['nama'];
         $harga = $_POST['harga'];
         $jenis = $_POST['jenis'];
         $stock = $_POST['stock'];
         $gambar = upload();
         if( !$gambar){
            return false;
          }
         $create = mysqli_query($conn,"INSERT INTO basket VALUES(
            '',
            '".$nama."',
            '".$harga."',
            '".$jenis."',
            '".$stock."',
            '".$gambar."'
         )");

         if($create){
            ?>
            <script>
            alert("data berhasil ditambahkan");
            window.location=('read.php');
         </script>
            <?php
         } else {
            echo "gagal" . mysqli_error($conn);
         }
      }
      function upload()
    {
      $namaFile = $_FILES['gambar']['name'];
      $ukuranFile = $_FILES['gambar']['size'];
      $error = $_FILES['gambar']['error'];
      // $tmpName = $_FILES['gambar']['tmp_name'];
      $tmp = $_FILES['gambar']['tmp_name'];

      if ($error == 4) {
          echo " <script>
                  alert('pilih gambar terlebih dahulu');
                  window.location=('create.php');
                </script> ";
          return false;
      }


      $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
      $ekstensiGambar = explode('.', $namaFile);
      $ekstensiGambar = strtolower(end($ekstensiGambar));

      if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
          echo " <script>
            alert('Yang Anda Upload Bukan Gambar');
            window.location=('create.php');
          </script> ";
          return false;
      }

      if ( $ukuranFile > 1000000) {
            echo " <script>
                    alert('Ukuran Gambar Anda Terlalu Besar');
                    window.location=('create.php');
                  </script> ";
            return false;
        # code...
      }

      //generate nama baru
      $namaFileBaru = uniqid();
      $namaFileBaru .= '.';
      $namaFileBaru .= $ekstensiGambar;
      // var_dump($namaFileBaru);

      move_uploaded_file($tmp, 'img/'.$namaFile);
  

      return $namaFile;
    }
   ?>

</body>

</html>