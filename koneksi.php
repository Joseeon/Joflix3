<?php
$koneksi = mysqli_connect("localhost", "root", "", "joflix");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
