<?php
include 'koneksi.php';
$data = mysqli_query($conn, "SELECT produk.*, gudang.nama_gudang FROM produk JOIN gudang ON produk.gudang_id=gudang.id WHERE stok=0");
include 'view/dashboard.php';
?>