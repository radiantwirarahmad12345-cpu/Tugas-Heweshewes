<?php include 'view/layout.php'; ?>
<h1>Data Produk Motor</h1>
<form class="cari"><input type="text" name="cari" placeholder="Cari produk..." value="<?=e($cari)?>"><button>Cari</button><input type="hidden" name="page" value="produk"></form>
<form class="form" method="post">
<input type="hidden" name="id" value="<?=e($edit['id']??'')?>">
<input name="nama_produk" placeholder="Nama Produk" required value="<?=e($edit['nama_produk']??'')?>">
<select name="kategori" required><option value="">Kategori</option><?php foreach(['Velg','Knalpot','Sparepart','Aksesoris'] as $x): ?><option value="<?=$x?>" <?=($edit['kategori']??'')==$x?'selected':''?>><?=$x?></option><?php endforeach;?></select>
<input name="merk" placeholder="Merk" required value="<?=e($edit['merk']??'')?>">
<input name="ukuran" placeholder="Ukuran/Tipe" required value="<?=e($edit['ukuran']??'')?>">
<input type="number" name="stok" placeholder="Stok" min="0" required value="<?=e($edit['stok']??0)?>">
<input type="number" name="harga" placeholder="Harga" min="0" required value="<?=e($edit['harga']??0)?>">
<select name="gudang_id" required><option value="">Gudang</option><?php while($g=mysqli_fetch_assoc($gudang)): ?><option value="<?=$g['id']?>" <?=($edit['gudang_id']??'')==$g['id']?'selected':''?>><?=e($g['nama_gudang'])?></option><?php endwhile;?></select>
<select name="supplier_id" required><option value="">Supplier</option><?php while($s=mysqli_fetch_assoc($supplier)): ?><option value="<?=$s['id']?>" <?=($edit['supplier_id']??'')==$s['id']?'selected':''?>><?=e($s['nama_supplier'])?></option><?php endwhile;?></select>
<button name="simpan"><?= $edit?'Update':'Tambah Produk' ?></button>
</form>
<table><tr><th>Produk</th><th>Kategori</th><th>Merk</th><th>Ukuran</th><th>Stok</th><th>Harga</th><th>Gudang</th><th>Supplier</th><th>Status</th><th>Aksi</th></tr>
<?php while($r=mysqli_fetch_assoc($data)): ?><tr><td><?=e($r['nama_produk'])?></td><td><?=e($r['kategori'])?></td><td><?=e($r['merk'])?></td><td><?=e($r['ukuran'])?></td><td><?=$r['stok']?></td><td>Rp <?=number_format($r['harga'],0,',','.')?></td><td><?=e($r['nama_gudang'])?></td><td><?=e($r['nama_supplier'])?></td><td><?php if($r['stok']==0): ?><span class="habis">HABIS</span><?php elseif($r['stok']<=5): ?><span class="menipis">MENIPIS</span><?php else: ?><span class="tersedia">TERSEDIA</span><?php endif;?></td><td><a href="?page=produk&edit=<?=$r['id']?>">Edit</a> | <a class="hapus" onclick="return confirm('Hapus produk?')" href="?page=produk&hapus=<?=$r['id']?>">Hapus</a></td></tr><?php endwhile;?></table>
</div></body></html>