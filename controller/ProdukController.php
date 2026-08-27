<?php
include 'model/ProdukModel.php';
$model = new ProdukModel();

if (isset($_GET['hapus'])) {
    $model->hapus($_GET['hapus']);
    header("Location: index.php?page=produk");
    exit;
}

if (isset($_POST['simpan'])) {
    $model->simpan($_POST);
    header("Location: index.php?page=produk");
    exit;
}

$edit = isset($_GET['edit']) ? $model->get($_GET['edit']) : null;
$cari = $_GET['cari'] ?? '';
$data = $model->semua($cari);
$gudang = $model->gudang();
$supplier = $model->supplier();

include 'view/produk.php';
?>