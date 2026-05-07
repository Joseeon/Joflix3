<?php

session_start();
include "koneksi.php";
if (!isset($_SESSION["user"])) {
  header("Location: Joflix.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="Joflix.css">
</head>

<body>
  <nav class="navbar" style="background:#8d1616;"> >
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

  <div class="dash-container">
    <div class="title">
      <h1>NIKMATI</h1>
      <h1 style="color: #8d1616;">FILM</h1>
      <h1>FAVORITMU</h1>
      <p align="center">Dibalik layar yang menyala, selalu ada kisah yang siap menginspirasi, <br> menghibur, dan
        menggetarkan hati. Melalui layanan ini kami <br> menghadirkan kemudahan bagi Anda untuk memesan tiket dan
        menjadi <br> bagian dari setiap momen tak terlupakan di bioskop. </p>


    </div>
    <hr>
    <div class="film">

      <?php
      $films = mysqli_query($koneksi, "SELECT * FROM film");
      while ($film = mysqli_fetch_assoc($films)) {
      ?>

        <div class="card mb-3" style="max-width: 600px;">
          <div class="row g-0">

            <div class="col-md-4">
              <img src="<?= $film['gambar'] ?>"
                class="img-fluid rounded-start">
            </div>

            <div class="col-md-8">
              <div class="card-body">

                <h5 class="card-title">
                  <?= $film['nama_film'] ?>
                </h5>

                <p class="card-text" style="color: var(--light-color);">
                  <?= $film['genre'] ?>
                </p>

                <p class="card-text">
                  <small class="text-body-secondary">
                    <?= $film['durasi'] ?> / Tayang <?= $film['jam_tayang'] ?>
                  </small>
                </p>

                <p class="card-text">
                  <?= $film['deskripsi'] ?>
                </p>

                <div class="price-box">
                  <p>Rp <?= $film['harga'] ?></p>
                </div>

              </div>
            </div>

          </div>
        </div>

      <?php } ?>
    </div>
    <div class="pesan">
      <a href="pesan.php">
        <button type="button" class="btn btn-primary">Pesan Tiket</button>
      </a>

    </div>
  </div>
</body>

</html>