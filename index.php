<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Data Cars</title>
		<link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<br>
			<CENTER><h1>Data Mobil</h1></CENTER>
			<a href="create.php" class="btn btn-success">Tambah Data</a>
			<?php
				if (isset($_SESSION['success'])) {
					echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
				}
			?>
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Id</th>
						<th scope="col">Brand</th>
						<th scope="col">Model</th>
						<th scope="col">Price</th>
                        <th scope="col">Aksi</th>
					</tr>
				</thead>
				<?php
					require 'config.php';
					$mobil = $collection->find();
					foreach ($mobil as $mbl) {
						echo "<tr>";
						echo "<th scope='row'>".$mbl->ID."</th>";
						echo "<td>".$mbl->BRAND."</td>";
						echo "<td>".$mbl->MODEL."</td>";
                        echo "<td>".$mbl->PRICE."</td>";
						echo "<td>";
						echo "<a href = 'edit.php?id=".$mbl->_id."'class='btn btn-primary'>EDIT</a>";
						echo "<a href = 'hapus.php?id=".$mbl->_id."'class='btn btn-danger'>HAPUS</a>";
						echo "</td>";
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</body>
</html>