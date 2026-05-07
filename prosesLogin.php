<?php
session_start();
include "koneksi.php";

$user = $_POST["username"];
$pw = $_POST["password"];

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user'");
$data = mysqli_fetch_assoc($query);

if ($data && $pw == $data['password']) {
    $_SESSION["user"] = $data["username"];
    header("Location: dash.php");
    exit;
} else {
    echo "Login gagal";
}
