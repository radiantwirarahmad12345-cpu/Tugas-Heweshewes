<?php
include 'koneksi.php';
class SupplierModel {
 function semua(){global $conn;return mysqli_query($conn,"SELECT * FROM supplier ORDER BY id DESC");}
 function get($id){global $conn;return mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM supplier WHERE id=$id"));}
 function simpan($p){global $conn;$id=(int)($p['id']??0);$n=mysqli_real_escape_string($conn,$p['nama_supplier']);$k=mysqli_real_escape_string($conn,$p['kontak']);$pr=mysqli_real_escape_string($conn,$p['produk']);if($id)mysqli_query($conn,"UPDATE supplier SET nama_supplier='$n',kontak='$k',produk='$pr' WHERE id=$id");else mysqli_query($conn,"INSERT INTO supplier(nama_supplier,kontak,produk) VALUES('$n','$k','$pr')");}
 function hapus($id){global $conn;mysqli_query($conn,"DELETE FROM supplier WHERE id=$id");}
}
?>