<?php 
session_start();
if (!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}
require 'process.php';
$datas = show();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>UTS Pemroweb</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="logout.php">Logout</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        </div>
    </div>
</nav>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Kota</th>
      <th scope="col">Kode Negara</th>
      <th scope="col">Distrik</th>
	  <th scope="col">Populasi</th>
	  <th scope="col"><a href="tambah.php"><button type="button" class="btn btn-success">Tambah Data</button></a></th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 1;
  foreach($datas as $row) : ?>
    <tr>
      <th scope="row"><?= $i; ?></th>
      <td><?= $row["Name"]; ?></td>
      <td><?= $row["CountryCode"]; ?></td>
      <td><?= $row["District"]; ?></td>
	  <td><?= $row["Population"]; ?></td>
	  <td><a href="update.php?id=<?= $row["ID"]; ?>" onClick="return confirm('Anda yakin mau mengubah?');"><button type="button" class="btn btn-primary">Ubah</button></a> 
	  <a href="hapus.php?id=<?= $row["ID"]; ?>" onClick="return confirm('Anda yakin mau menghapus?');"><button type="button" class="btn btn-danger">Hapus</button></a></td>
    </tr>
	<?php $i++; ?>
   <?php endforeach; ?>
  </tbody>
</table>
    
</body>
</html>