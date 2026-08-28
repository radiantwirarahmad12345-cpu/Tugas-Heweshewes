<?php
include 'koneksi.php';

class ProdukModel {
    function semua($cari='') {
        global $conn;
        $cari = mysqli_real_escape_string($conn,$cari);
        return mysqli_query($conn,
        "SELECT produk.*,gudang.nama_gudang,supplier.nama_supplier
         FROM produk
         JOIN gudang ON produk.gudang_id=gudang.id
         JOIN supplier ON produk.supplier_id=supplier.id
         WHERE produk.nama_produk LIKE '%$cari%'
         OR produk.kategori LIKE '%$cari%'
         OR produk.merk LIKE '%$cari%'
         ORDER BY produk.id DESC");
    }

    function get($id) {
        global $conn;
        return mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM produk WHERE id=$id"));
    }

    function simpan($p) {
        global $conn;
        $id=(int)($p['id']??0);
        $nama=mysqli_real_escape_string($conn,$p['nama_produk']);
        $kat=mysqli_real_escape_string($conn,$p['kategori']);
        $merk=mysqli_real_escape_string($conn,$p['merk']);
        $uk=mysqli_real_escape_string($conn,$p['ukuran']);
        $stok=(int)$p['stok'];
        $harga=(int)$p['harga'];
        $g=(int)$p['gudang_id'];
        $s=(int)$p['supplier_id'];

        if($id>0) {
            mysqli_query($conn,"UPDATE produk SET nama_produk='$nama',kategori='$kat',merk='$merk',ukuran='$uk',stok=$stok,harga=$harga,gudang_id=$g,supplier_id=$s WHERE id=$id");
        } else {
            mysqli_query($conn,"INSERT INTO produk(nama_produk,kategori,merk,ukuran,stok,harga,gudang_id,supplier_id)
            VALUES('$nama','$kat','$merk','$uk',$stok,$harga,$g,$s)");
        }
    }

    function hapus($id) {
        global $conn;
        mysqli_query($conn,"DELETE FROM produk WHERE id=$id");
    }

    function gudang() {
        global $conn;
        return mysqli_query($conn,"SELECT * FROM gudang ORDER BY nama_gudang");
    }

    function supplier() {
        global $conn;
        return mysqli_query($conn,"SELECT * FROM supplier ORDER BY nama_supplier");
    }
}
?>