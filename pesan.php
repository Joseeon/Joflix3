<?php session_start();
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
    <title>Pesan Tiket</title>

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

    <form method="POST" action="berhasil.php">
        <div class="pesan-container">
            <div class="title">
                <h1>Form Pemesanan</h1>
            </div>
            <div class="nama-container">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="nama" placeholder="Nama :" aria-label="Nama :">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="email" placeholder="Email :" aria-label="Email :">
                    </div>
                </div>
            </div>

            <div class="radio-container">

                <p>Film yang ingin dipesan :</p>

                <?php
                $films = mysqli_query($koneksi, "SELECT * FROM film");

                while ($film = mysqli_fetch_assoc($films)) {
                ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                            name="film" value="<?= $film['id_film'] ?>">

                        <label class="form-check-label">
                            <?= $film['nama_film'] ?>
                        </label>
                    </div>
                <?php } ?>
            </div>

            <div class="nama-container">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Jumlah Tiket :" name="jumlah"
                            aria-label="Jumlah Tiket :">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Pilih Kursi :" name="kursi" aria-label="Pilih Kursi :">
                    </div>
                </div>
            </div>

            <div class="pay-container">
                <p class="mb-3">Metode Pembayaran :</p>
                <div class="form-check">

                    <input class="form-check-input" type="radio" name="pembayaran" id="radioDefault7" value="Cash">
                    <label class="form-check-label" for="radioDefault7">
                        Cash
                    </label>
                </div>
                <div class="form-check">

                    <input class="form-check-input" type="radio" name="pembayaran" id="radioDefault8" value="QRIS">
                    <label class="form-check-label" for="radioDefault8">
                        QRIS
                    </label>
                </div>

            </div>
            <div class="confirm-container">
                <div class="d-grid gap-3 mt-4">

                    <button type="submit" class="btn btn-primary">Pesan</button>

                    <button type="reset" class="btn btn-outline-danger">Muat Ulang</button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>