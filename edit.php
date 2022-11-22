<?php session_start();
   require 'config.php';
   if (isset($_GET['id'])) {
      $mbl = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   }
   if(isset($_POST['submit'])){
      $collection->updateOne(
          ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
          ['$set' => ['ID' => $_POST['ID'], 'BRAND' => $_POST['BRAND'], 'MODEL' => $_POST['MODEL'], 'PRICE' => $_POST['PRICE']]]
      );
      $_SESSION['success'] = "Data Mobil berhasil diubah";
      header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Edit data</title>
      <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container">
         <br>
         <CENTER><h1>Edit Data Mobil</h1></CENTER>
         <a href="index.php" class="btn btn-primary">Kembali</a>
         <form method="POST">
            <div class="form-group">
               <strong>ID:</strong>
               <input type="text" value="<?php echo "$mbl->ID"; ?>" class="form-control" name="ID" required="" placeholder="xxxx">
               <strong>BRAND:</strong>
               <input type="text" class="form-control" name="BRAND" placeholder="Brand">
               <strong>MODEL:</strong>
               <input type="text" class="form-control" name="MODEL" placeholder="Model">
               <strong>PRICE:</strong>
               <input type="text" class="form-control" name="PRICE" placeholder="Price">
               <br>
               <button type="submit" name="submit" class="btn btn-success">Simpan</button>
            </div>
         </form>
      </div>
   </body>
</html>