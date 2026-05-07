<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION["user"])) {
    header("Location: Joflix.php");
    exit;
}

$id = $_GET['id'];

$query = mysqli_query($koneksi, " SELECT p.*, f.nama_film FROM pesanan p
JOIN film f ON p.id_film = f.id_film
WHERE p.id_pesanan = $id");

$data = mysqli_fetch_assoc($query);

$films = mysqli_query($koneksi, "SELECT * FROM film");

if (isset($_POST['update'])) {

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $film = $_POST['film'];
    $jumlah = $_POST['jumlah'];
    $kursi = $_POST['kursi'];

    mysqli_query($koneksi, "UPDATE pesanan SET nama='$nama',email='$email',
    id_film='$film',jumlah='$jumlah',kursi='$kursi' WHERE id_pesanan=$id");

    header("Location: invoice.php?id=$id");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Pesanan</title>
    <link rel="stylesheet" href="Joflix.css">
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
            <h2>Edit Pesanan Tiket</h2>
        </div>

        <form method="POST">
            <table class="table table-bordered">
                <tr>
                    <th>Nama</th>
                    <td><input type="text" name="nama" value="<?= $data['nama'] ?>"></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="text" name="email" value="<?= $data['email'] ?>"></td>
                </tr>
                <tr>
                    <th>Film</th>
                    <td> <select name="film">

                            <?php while ($film = mysqli_fetch_assoc($films)) { ?>

                                <option value="<?= $film['id_film'] ?>"

                                    <?php
                                    if ($film['id_film'] == $data['id_film']) {
                                        echo "selected";
                                    }
                                    ?>>

                                    <?= $film['nama_film'] ?>

                                </option>

                            <?php } ?>

                        </select></td>
                </tr>
                <tr>
                    <th>Jumlah Tiket</th>
                    <td><input type="number" name="jumlah" value="<?= $data['jumlah'] ?>"></td>
                </tr>
                <tr>
                    <th>Kursi</th>
                    <td><input type="text" name="kursi" value="<?= $data['kursi'] ?>"></td>
                </tr>
            </table>

            <button type="submit" name="update" class="btn btn-primary">Simpan perubahan</button>
        </form>

    </div>

</body>

</html>