<?php
session_start();
include "koneksi.php";

$nama = $_POST["nama"];
$email = $_POST["email"];
$film = $_POST["film"];
$jumlah = $_POST["jumlah"];
$kursi = $_POST["kursi"];
$pembayaran = $_POST["pembayaran"];

mysqli_query($koneksi, "INSERT INTO pesanan (nama, email, id_film, jumlah, kursi, pembayaran)
VALUES ('$nama','$email','$film','$jumlah','$kursi','$pembayaran')");

$id = mysqli_insert_id($koneksi);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Tiket Berhasil</title>

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
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Pesanan Tiket Berhasil!</h4>
            <p>Tiket selanjutnya akan dikirimkan melalui email. Cek email secara berkala.</p>
            <hr>
            <p class="mb-0">Terima Kasih :D</p>
            <a href="invoice.php?id=<?= $id ?>" class="btn btn-success">Lihat Invoice</a>
        </div>
    </div>

</body>

</html>