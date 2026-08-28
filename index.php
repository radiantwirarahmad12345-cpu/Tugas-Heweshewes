<?php
$page = $_GET['page'] ?? 'dashboard';

if ($page == 'produk') {
    include 'controller/ProdukController.php';
} elseif ($page == 'gudang') {
    include 'controller/GudangController.php';
} elseif ($page == 'supplier') {
    include 'controller/SupplierController.php';
} elseif ($page == 'admin') {
    include 'controller/AdminController.php';
} else {
    include 'controller/DashboardController.php';
}
?>