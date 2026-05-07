<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");

    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Username sudah digunakan!');</script>";
    } else {
        mysqli_query($koneksi, "INSERT INTO user (username,email,password) 
        VALUES ('$username','$email','$password')");

        header("Location: Joflix.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="Joflix.css">
    <style>
        body {
            display: flex;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <div class="title">
            <h1>Register</h1>
            <p>Masukkan username, email, dan password</p>
        </div>
        <form method="POST">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingUsername" name="username" placeholder="Username">
                <label for="floatingUsername">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingEmail" name="email" placeholder="Email">
                <label for="floatingEmail">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Register</button>

        </form>

        <hr class="divider">

        <button type="button" class="btn btn-outline-primary ">
            <i class="bi bi-google"></i> Login with Google
        </button>

        <div class="register">
            <p>Sudah punya akun? <a href="Joflix.php">Login</a></p>
        </div>
    </div>

</body>

</html>