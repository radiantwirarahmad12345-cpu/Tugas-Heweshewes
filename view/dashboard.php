<?php include 'view/layout.php'; ?>
<h1>Dashboard Gudang Motor</h1>
<p>Selamat datang di aplikasi gudang motor.</p>
<div class="kotak">
<h3>Menu Produk</h3><p>Kelola data velg, knalpot, sparepart dan aksesoris motor.</p>
<a class="tombol" href="index.php?page=produk">Lihat Produk</a>
</div>
<div class="peringatan">
<h3>⚠️ Peringatan Stok Habis</h3>
<?php if(mysqli_num_rows($data)==0): ?><p>Tidak ada stok yang habis.</p>
<?php else: while($r=mysqli_fetch_assoc($data)): ?><p><b><?=e($r['nama_produk'])?></b> di <?=e($r['nama_gudang'])?> stoknya habis.</p><?php endwhile; endif; ?>
</div>
</div></body></html>