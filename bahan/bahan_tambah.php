<?php include '../header.php'; ?>
<?php include '../koneksi.php'; ?>

<h2>➕ Tambah Bahan Baku</h2>

<form method="POST">
    <div style="margin-bottom: 15px;">
        <label style="color: white; display: block; margin-bottom: 8px;">Nama Bahan</label>
        <input type="text" name="nama_bahan" placeholder="Masukkan nama bahan" required>
    </div>

    <div style="margin-bottom: 15px;">
        <label style="color: white; display: block; margin-bottom: 8px;">Stok Saat Ini</label>
        <input type="number" name="stok" placeholder="Masukkan stok" required>
    </div>

    <div style="margin-bottom: 15px;">
        <label style="color: white; display: block; margin-bottom: 8px;">Satuan</label>
        <input type="text" name="satuan" placeholder="Contoh: kg, liter, butir" required>
    </div>

    <button type="submit" name="submit" style="background: rgba(34, 197, 94, 0.15); border: 2px solid rgba(34, 197, 94, 0.3); color: #86efac;">💾 Simpan</button>
    <a href="bahan.php" class="btn" style="background: rgba(239, 68, 68, 0.15); border: 2px solid rgba(239, 68, 68, 0.3); color: #fca5a5;">❌ Batal</a>
</form>

<?php
if(isset($_POST['submit'])){
    $nama = $_POST['nama_bahan'];
    $stok = $_POST['stok'];
    $satuan = $_POST['satuan'];

    $insert = mysqli_query($conn, "INSERT INTO Bahan_Baku (nama_bahan, stok_saat_ini, satuan) 
                                   VALUES ('$nama', $stok, '$satuan')");

    if($insert){
        echo "<script>alert('Bahan berhasil ditambahkan!'); window.location='bahan.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan bahan!');</script>";
    }
}
?>

<?php include '../footer.php'; ?>