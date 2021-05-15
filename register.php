<?php
session_start();
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require 'process.php';

if( isset($_POST["register"])) {
    if( register($_POST) > 0 ) {
        echo "<script>alert('User Berhasil Register!');document.location.href = 'login.php';</script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <style>
        .container {
            width : 30%;
            margin-top : 10%;
            box-shadow : 0 3px 20px rgba(0,0,0,0.4);
            padding : 40px;
        }
    </style>

    <title>Register</title>
  </head>
  <body>
    <div class="container">
        <h4 class="text-center"><b>REGISTER</b></h4>

        <form action="" method="post">
            <div class="mb-3 form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" placeholder="masukkan username" required>
            </div>

            <div class="mb-3 form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="masukkan password" required>
            </div>

            <div class="mb-3 form-group">
                <label for="password2">Konfirmasi Password</label>
                <input type="password" name="password2" class="form-control" placeholder="konfirmasi password" required>
            </div>

            <button type="submit" name="register" class="btn btn-success">Register</button>
            <a href="login.php"><button type="button" class="btn btn-primary">Login</button></a>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>
