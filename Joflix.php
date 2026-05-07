<?php
session_start();
include 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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

    </div>
    <div class="form-container">
        <div class="title">
            <h1>Login</h1>
            <p>Enter your email and password to continue</p>
        </div>
        <form action="prosesLogin.php" method="POST">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingUsername" name="username" placeholder="Username">
                <label for="floatingUsername">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <button type="submit" class="btn btn-primary">Sign In</button>

        </form>

        <div class="remember-container">
            <label class="remember-me">
                <input type="checkbox" id="rememberMe">
                <label for="rememberMe">Remember me</label>
            </label>

            <a href="#">Need Help?</a>
        </div>

        <hr class="divider">

        <button type="button" class="btn btn-outline-primary ">
            <i class="bi bi-google"></i> Login with Google
        </button>

        <div class="register">
            <p>New in Joflix? <a href="register.php">Register</a></p>
        </div>
    </div>
</body>

</html>