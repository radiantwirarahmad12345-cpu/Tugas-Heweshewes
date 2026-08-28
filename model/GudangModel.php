<?php
include 'koneksi.php';
class GudangModel {
 function semua(){global $conn;return mysqli_query($conn,"SELECT * FROM gudang ORDER BY id DESC");}
 function get($id){global $conn;return mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM gudang WHERE id=$id"));}
 function simpan($p){global $conn;$id=(int)($p['id']??0);$n=mysqli_real_escape_string($conn,$p['nama_gudang']);$l=mysqli_real_escape_string($conn,$p['lokasi']);if($id)mysqli_query($conn,"UPDATE gudang SET nama_gudang='$n',lokasi='$l' WHERE id=$id");else mysqli_query($conn,"INSERT INTO gudang(nama_gudang,lokasi) VALUES('$n','$l')");}
 function hapus($id){global $conn;mysqli_query($conn,"DELETE FROM gudang WHERE id=$id");}
}
?>