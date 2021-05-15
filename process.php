<?php 

$conn = mysqli_connect("localhost", "root", "","uts192410102031");


function show() {
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM city ORDER BY ID DESC");
	$records = [];
	while ( $row = mysqli_fetch_assoc($result)) {
		$records[] = $row;
	}
	return $records;
}
function showindiv($id) {
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM city WHERE ID = $id");
	$records = [];
	while ( $row = mysqli_fetch_assoc($result)) {
		$records[] = $row;
	}
	return $records;
}

function showcode() {
	global $conn;
	$result = mysqli_query($conn, "SELECT Code FROM country ");
	$records = [];
	while ( $row = mysqli_fetch_assoc($result)) {
		$records[] = $row;
	}
	return $records;
}

function tambahdata($post) {
	global $conn;
	$namakota = htmlspecialchars($post["namakota"]);
	$kode = htmlspecialchars($post["kode"]);
	$distrik = htmlspecialchars($post["distrik"]);
	$populasi = htmlspecialchars($post["populasi"]);
	
	$query = "INSERT INTO city VALUES('', '$namakota', '$kode', '$distrik', $populasi)";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM `city` WHERE `city`.`ID` = $id");
	return mysqli_affected_rows($conn);
}

function ubahdata($post) {
	global $conn;
	$id = $post["id"];
	$namakota = htmlspecialchars($post["namakota"]);
	$kode = htmlspecialchars($post["kode"]);
	$distrik = htmlspecialchars($post["distrik"]);
	$populasi = htmlspecialchars($post["populasi"]);
	
	$query = "UPDATE `city` SET 
				`Name` = '$namakota', 
				`CountryCode` = '$kode', 
				`District` = '$distrik',
				`Population` = '$populasi' WHERE `city`.`ID` = $id; ";
				
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
}

function register($data) {
	global $conn;
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn,$data["password"]);
	$password2 = mysqli_real_escape_string($conn,$data["password2"]);

	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>alert('Username sudah ada!')</script>";
		return false;
	}

	if ($password !== $password2) {
		echo "<script>alert('Konfirmasi Password Tidak Sesuai!')</script>";
		return false;
	}
	$password = password_hash($password, PASSWORD_DEFAULT);
	mysqli_query($conn, "INSERT INTO users VALUES('','$username', '$password')");
	return mysqli_affected_rows($conn);
}

?>

