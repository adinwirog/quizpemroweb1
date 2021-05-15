<?php 
session_start();
if (!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}
require 'process.php';
$codes = showcode();

$id = $_GET["id"];
$data = showindiv($id)[0];

if( isset($_POST["submit"])) {
	if (ubahdata($_POST) > 0) {
		echo "<script>
		alert('Data Berhasil diubah');
		document.location.href = 'index.php';
		</script>";
	} else {
		echo "<script>
		alert('Gagal Mengubah data');
		document.location.href = 'index.php';
		</script>";
	};
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Ubah Data</title>
</head>
<body>
	<h1 class="display-1">Form Ubah Data</h1>
	<br>
	
    <form action="" method="post">
	<input type="hidden" name="id" value="<?= $data["ID"] ?>">
  <div class="mb-3">
    <label for="namakota" class="form-label">Nama Kota</label>
    <input type="text" class="form-control" name="namakota" id="namakota" aria-describedby="emailHelp" value="<?= $data["Name"] ?>" required>
  </div>
  <br>
  <label for="kode" class="form-label">Kode Negara</label>
  <select class="form-select" aria-label="Default select example" name="kode">
  <option value="<?= $data["CountryCode"] ?>"><?= $data["CountryCode"] ?></option>
  <?php foreach($codes as $code) : ?>
  <option value="<?= $code["Code"]?>"><?= $code["Code"]?></option>
  <?php endforeach; ?>
</select>
<br>
  <div class="mb-3">
    <label for="distrik" class="form-label">Distrik</label>
    <input type="text" class="form-control" name="distrik" id="distrik" aria-describedby="emailHelp" value="<?= $data["District"] ?>" required>
  </div>
  <div class="mb-3">
    <label for="populasi" class="form-label">Populasi</label>
    <input type="text" class="form-control" name="populasi" id="populasi" aria-describedby="emailHelp" value="<?= $data["Population"] ?>" required>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Ubah Data</button>
	</form>

</body>
</html>