<?php session_start();
   require 'config.php';
   if (isset($_GET['id'])) {
      $mbl = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   }
   if(isset($_POST['submit'])){
         require 'config.php';
   $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   $_SESSION['success'] = "Data Mobil Berhasil dihapus";
   header("Location: index.php");
   }
?>

<!DOCTYPE html>
<html>
   <head>
      <title>Hapus data</title>
      <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container">
         <br>
         <CENTER><h1>Hapus Data Mobil</h1></CENTER>
         <h3> Hapus brand  <?php echo "$mbl->BRAND"; ?> dengan Id <?php echo "$mbl->ID"; ?> ? </h3>
         <form method="POST">
            <div class="form-group">
               <input type="hidden" value="<?php echo "$mbl->ID"; ?>" class="form-control" name="ID">
               <a href="index.php" class="btn btn-primary">Kembali</a>
               <button type="submit" name="submit" class="btn btn-danger">Hapus</button>
            </div>
         </form>
      </div>
   </body>
</html>