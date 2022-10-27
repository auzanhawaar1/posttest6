<?php 
   include('koneksi.php');

   if(isset($_GET['id_basket'])){
      $delete = mysqli_query($conn, "DELETE FROM basket WHERE id= '".$_GET['id_basket']."'");

      if($delete){
         ?>
            <script>
            alert("data berhasil dihapus");
            window.location=('read.php');
            </script>
         <?php
      }
   }
?>