<?php
$conn = mysqli_connect("localhost","root","","db_gudang_motor");
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>