<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION["user"])) {
  header("Location: Joflix.php");
  exit;
}

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT p.*, f.nama_film, f.harga FROM pesanan p
JOIN film f ON p.id_film = f.id_film WHERE p.id_pesanan = $id");

$data = mysqli_fetch_assoc($query);

$total = $data['harga'] * $data['jumlah'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="Joflix.css">
</head>

<body>
  <nav class="navbar" style="background:#8d1616;">
    <div class="container">
      <a class="navbar-brand text-white" href="#">
        <img src="https://upload.wikimedia.org/wikipedia/id/e/e4/Logo_Alter_Ego_Esports.png" alt="Logo" width="50" height="44" class="d-inline-block align-text-top">
        <span class="fw-bold">JOFLIX</span>
      </a>
      <span class="text-white">
        <i class="bi bi-person-circle"></i>
        <?= $_SESSION["user"] ?>
        <a href="logout.php" class="btn btn-danger">
          Logout
        </a>
      </span>
    </div>
  </nav>
  <div class="invoice-container">
    <div class="invoice-header">
      <h2>INVOICE</h2>
    </div>
    <table class="table table-bordered">
      <tr>
        <th>Nama</th>
        <td><?= $data['nama'] ?></td>
      </tr>
      <tr>
        <th>Email</th>
        <td><?= $data['email'] ?></td>
      </tr>
      <tr>
        <th>Film</th>
        <td><?= $data['nama_film'] ?></td>
      </tr>
      <tr>
        <th>Harga per Tiket</th>
        <td>Rp <?= $data['harga'] ?></td>
      </tr>
      <tr>
        <th>Jumlah</th>
        <td><?= $data['jumlah'] ?></td>
      </tr>
      <tr>
        <th>Kursi</th>
        <td><?= $data['kursi'] ?></td>
      </tr>
      <tr>
        <th>Pembayaran</th>
        <td><?= $data['pembayaran'] ?></td>
      </tr>
      <tr class="table-danger">
        <th>Total</th>
        <td><strong>Rp <?= $total ?></strong></td>
      </tr>
    </table>
    <div style="display:flex; gap:10px; ">
      <a href="edit.php?id=<?= $id ?>" class="btn btn-primary">Edit Pesanan</a>
      <a href="delete.php?id=<?= $id ?>" class="btn btn-primary">Batalkan pesanan</a>
    </div>
    <a href="pesan.php" class="btn btn-primary">Pesan Lagi</a>
  </div>
</body>

</html>