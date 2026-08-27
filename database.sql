CREATE DATABASE db_gudang_motor;
USE db_gudang_motor;

CREATE TABLE admin (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nama VARCHAR(100) NOT NULL,
 kontak VARCHAR(20) NOT NULL,
 email VARCHAR(100) NOT NULL
);

CREATE TABLE gudang (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nama_gudang VARCHAR(100) NOT NULL,
 lokasi VARCHAR(100) NOT NULL
);

CREATE TABLE supplier (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nama_supplier VARCHAR(100) NOT NULL,
 kontak VARCHAR(20) NOT NULL,
 produk VARCHAR(100) NOT NULL
);

CREATE TABLE produk (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nama_produk VARCHAR(100) NOT NULL,
 kategori VARCHAR(50) NOT NULL,
 merk VARCHAR(100) NOT NULL,
 ukuran VARCHAR(50) NOT NULL,
 stok INT NOT NULL,
 harga INT NOT NULL,
 gudang_id INT NOT NULL,
 supplier_id INT NOT NULL,
 FOREIGN KEY (gudang_id) REFERENCES gudang(id),
 FOREIGN KEY (supplier_id) REFERENCES supplier(id)
);

INSERT INTO admin (nama,kontak,email) VALUES
('Admin Gudang Motor','081234567890','admin@gudangmotor.com');

INSERT INTO gudang (nama_gudang,lokasi) VALUES
('Gudang Utama','Surabaya'),
('Gudang Cabang','Sidoarjo');

INSERT INTO supplier (nama_supplier,kontak,produk) VALUES
('PT Velg Jaya','081111111111','Velg Motor'),
('CV Knalpot Racing','082222222222','Knalpot Motor');

INSERT INTO produk
(nama_produk,kategori,merk,ukuran,stok,harga,gudang_id,supplier_id) VALUES
('Velg Racing','Velg','Racing Boy','17 Inch',10,850000,1,1),
('Knalpot Racing','Knalpot','Prospeed','Universal',5,1200000,1,2),
('Spion Motor','Aksesoris','VND','Universal',8,180000,2,1),
('Handgrip','Aksesoris','KTC','Universal',0,75000,2,2);
