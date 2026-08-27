<?php
include 'model/GudangModel.php';
$model = new GudangModel();

if (isset($_GET['hapus'])) {
    $model->hapus($_GET['hapus']);
    header("Location: index.php?page=gudang");
    exit;
}

if (isset($_POST['simpan'])) {
    $model->simpan($_POST);
    header("Location: index.php?page=gudang");
    exit;
}

$edit = isset($_GET['edit']) ? $model->get($_GET['edit']) : null;
$data = $model->semua();
include 'view/gudang.php';
?>