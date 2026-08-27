<?php
include 'model/AdminModel.php';
$model = new AdminModel();

if (isset($_GET['hapus'])) {
    $model->hapus($_GET['hapus']);
    header("Location: index.php?page=admin");
    exit;
}

if (isset($_POST['simpan'])) {
    $model->simpan($_POST);
    header("Location: index.php?page=admin");
    exit;
}

$edit = isset($_GET['edit']) ? $model->get($_GET['edit']) : null;
$data = $model->semua();
include 'view/admin.php';
?>