<?php session_start();
   if(isset($_POST['submit'])){
      require 'config.php';
      $insertOneResult = $collection->insertOne([
          'ID' => $_POST['ID'],
          'BRAND' => $_POST['BRAND'],
          'MODEL' => $_POST['MODEL'],
          'PRICE' => $_POST['PRICE'],
      ]);
      $_SESSION['success'] = "Data Mobil Berhasil di tambahkan";
      header("Location: index.php");
   }
?>

<!DOCTYPE html>
<html>
   <head>
      <title>Tambahkan data</title>
      <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container">
         <br>
         <CENTER><h1>Tambah Data Mobil</h1></CENTER>
         <a href="index.php" class="btn btn-primary">Kembali</a>
         <form method="POST">
            <div class="form-group">
               <strong>ID:</strong>
               <input type="text" class="form-control" name="ID" required="" placeholder="xxxx">
               <strong>BRAND:</strong>
               <input type="text" class="form-control" name="BRAND" placeholder="Brand">
               <strong>MODEL:</strong>
               <input type="text" class="form-control" name="MODEL" placeholder="Model">
               <strong>PRICE:</strong>
               <input type="text" class="form-control" name="PRICE" placeholder="xxxx">
               <br>
               <button type="submit" name="submit" class="btn btn-success">Tambah</button>
            </div>
         </form>
      </div>
   </body>
</html>