<?php
include 'koneksi.php';
class AdminModel {
 function semua(){global $conn;return mysqli_query($conn,"SELECT * FROM admin ORDER BY id DESC");}
 function get($id){global $conn;return mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin WHERE id=$id"));}
 function simpan($p){global $conn;$id=(int)($p['id']??0);$n=mysqli_real_escape_string($conn,$p['nama']);$k=mysqli_real_escape_string($conn,$p['kontak']);$e=mysqli_real_escape_string($conn,$p['email']);if($id)mysqli_query($conn,"UPDATE admin SET nama='$n',kontak='$k',email='$e' WHERE id=$id");else mysqli_query($conn,"INSERT INTO admin(nama,kontak,email) VALUES('$n','$k','$e')");}
 function hapus($id){global $conn;mysqli_query($conn,"DELETE FROM admin WHERE id=$id");}
}
?>