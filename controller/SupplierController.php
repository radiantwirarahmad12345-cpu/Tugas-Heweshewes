<?php
include 'model/SupplierModel.php';
$model = new SupplierModel();

if (isset($_GET['hapus'])) {
    $model->hapus($_GET['hapus']);
    header("Location: index.php?page=supplier");
    exit;
}

if (isset($_POST['simpan'])) {
    $model->simpan($_POST);
    header("Location: index.php?page=supplier");
    exit;
}

$edit = isset($_GET['edit']) ? $model->get($_GET['edit']) : null;
$data = $model->semua();
include 'view/supplier.php';
?>