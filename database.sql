CREATE DATABASE IF NOT EXISTS ayam_geprek;
USE ayam_geprek;

CREATE TABLE Kategori_Menu (
    id_kategori INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(100)
);

CREATE TABLE Menu (
    id_menu INT AUTO_INCREMENT PRIMARY KEY,
    nama_menu VARCHAR(100),
    harga INT,
    id_kategori INT,
    FOREIGN KEY (id_kategori) REFERENCES Kategori_Menu(id_kategori)
);

CREATE TABLE Bahan_Baku (
    id_bahan INT AUTO_INCREMENT PRIMARY KEY,
    nama_bahan VARCHAR(100),
    stok_saat_ini INT,
    satuan VARCHAR(50)
);

CREATE TABLE Resep (
    id_resep INT AUTO_INCREMENT PRIMARY KEY,
    id_menu INT,
    id_bahan INT,
    jumlah_kebutuhan INT,
    FOREIGN KEY (id_menu) REFERENCES Menu(id_menu),
    FOREIGN KEY (id_bahan) REFERENCES Bahan_Baku(id_bahan)
);

CREATE TABLE Pemasok (
    id_pemasok INT AUTO_INCREMENT PRIMARY KEY,
    nama_pemasok VARCHAR(100),
    alamat TEXT
);

CREATE TABLE Pembelian_Stok (
    id_beli INT AUTO_INCREMENT PRIMARY KEY,
    id_bahan INT,
    id_pemasok INT,
    tgl_beli DATE,
    total_biaya INT,
    FOREIGN KEY (id_bahan) REFERENCES Bahan_Baku(id_bahan),
    FOREIGN KEY (id_pemasok) REFERENCES Pemasok(id_pemasok)
);

CREATE TABLE Karyawan (
    id_karyawan INT AUTO_INCREMENT PRIMARY KEY,
    nama_karyawan VARCHAR(100),
    peran VARCHAR(50)
);

CREATE TABLE Meja (
    id_meja INT AUTO_INCREMENT PRIMARY KEY,
    nomor_meja INT,
    status VARCHAR(50)
);

CREATE TABLE Pesanan (
    id_pesanan INT AUTO_INCREMENT PRIMARY KEY,
    tgl_jam DATETIME,
    id_meja INT,
    id_karyawan INT,
    status_bayar VARCHAR(50),
    FOREIGN KEY (id_meja) REFERENCES Meja(id_meja),
    FOREIGN KEY (id_karyawan) REFERENCES Karyawan(id_karyawan)
);

CREATE TABLE Detail_Pesanan (
    id_detail INT AUTO_INCREMENT PRIMARY KEY,
    id_pesanan INT,
    id_menu INT,
    qty INT,
    level_pedas VARCHAR(20),
    subtotal INT,
    FOREIGN KEY (id_pesanan) REFERENCES Pesanan(id_pesanan),
    FOREIGN KEY (id_menu) REFERENCES Menu(id_menu)
);

-- SAMPLE DATA
INSERT INTO Kategori_Menu VALUES (1, 'Ayam Geprek');
INSERT INTO Kategori_Menu VALUES (2, 'Minuman');
INSERT INTO Kategori_Menu VALUES (3, 'Dessert');

INSERT INTO Menu VALUES (1, 'Ayam Geprek Biasa', 25000, 1);
INSERT INTO Menu VALUES (2, 'Ayam Geprek Pedas', 27000, 1);
INSERT INTO Menu VALUES (3, 'Es Teh Manis', 8000, 2);

INSERT INTO Bahan_Baku VALUES (1, 'Ayam', 50, 'kg');
INSERT INTO Bahan_Baku VALUES (2, 'Cabai Merah', 10, 'kg');
INSERT INTO Bahan_Baku VALUES (3, 'Bawang Putih', 5, 'kg');

INSERT INTO Meja VALUES (1, 1, 'Kosong');
INSERT INTO Meja VALUES (2, 2, 'Kosong');
INSERT INTO Meja VALUES (3, 3, 'Kosong');

INSERT INTO Karyawan VALUES (1, 'Budi', 'Pelayan');
INSERT INTO Karyawan VALUES (2, 'Siti', 'Kasir');