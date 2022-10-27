<?php 
   include('koneksi.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="tampilan.css">
   <title>READ</title>
</head>

<body>
   <a href="create.php" class="btn tambah">TAMBAH DATA</a>
   <table class="form">
      <thead>
         <tr>
            <th>No</th>
            <th>nama barang</th>
            <th>Harga barang</th>
            <th>Jenis barang</th>
            <th>Stock barang</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         <?php 
            $read = mysqli_query($conn, "SELECT * FROM basket");
            if(mysqli_num_rows($read) > 0){
               while($row = mysqli_fetch_array($read)){
                  ?>
                     <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['nama'] ?></td>
                        <td><?php echo $row['harga'] ?></td>
                        <td><?php echo $row['jenis'] ?></td>
                        <td><?php echo $row['stock'] ?></td>
                        <td><?php echo $row['gambar'] ?></td>
                        <td>
                           <a href="create.php" class="btn create">create</a>
                           <a href="update.php?id_basket=<?php echo $row['id']; ?>" class="btn update">Update</a>
                           <a href="delete.php?id_basket=<?php echo $row['id'];?>" class="btn delete">Delete</a>
                        </td>
                     </tr>
                  <?php
               }
            }
         ?>
      </tbody>
   </table>

</body>

</html>