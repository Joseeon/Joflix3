<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION["user"])) {
    header("Location: Joflix.php");
    exit;
}

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM pesanan WHERE id_pesanan = $id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Tiket Dibatalkan</title>

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
    <div class="berhasil">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Pesanan Tiket Dibatalkan!</h4>
            <p>Pesanan tiket Anda telah berhasil dibatalkan. Cek email secara berkala.</p>
            <hr>
            <p class="mb-0">Terima Kasih :D</p>
            <a href="dash.php" class="btn btn-primary">Kembali ke Dashboard</a>
        </div>
    </div>

</body>

</html>