<?php 
session_start();
if (!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}

require 'process.php';

$id = $_GET["id"];

if (hapus($id) > 0 ){
	echo "<script>
		alert('Data Berhasil dihapus');
		document.location.href = 'index.php';
		</script>";
} else {
	echo "<script>
		alert('Gagal Menghapus data');
		document.location.href = 'index.php';
		</script>";
}

?>