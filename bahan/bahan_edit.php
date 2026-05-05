<?php include '../header.php'; ?>
<?php include '../koneksi.php'; ?>

<h2>✏️ Edit Bahan Baku</h2>

<?php
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM Bahan_Baku WHERE id_bahan = $id");
$d = mysqli_fetch_array($data);
?>

<form method="POST">
    <div style="margin-bottom: 15px;">
        <label style="color: white; display: block; margin-bottom: 8px;">Nama Bahan</label>
        <input type="text" name="nama_bahan" value="<?= $d['nama_bahan']; ?>" required>
    </div>

    <div style="margin-bottom: 15px;">
        <label style="color: white; display: block; margin-bottom: 8px;">Stok Saat Ini</label>
        <input type="number" name="stok" value="<?= $d['stok_saat_ini']; ?>" required>
    </div>

    <div style="margin-bottom: 15px;">
        <label style="color: white; display: block; margin-bottom: 8px;">Satuan</label>
        <input type="text" name="satuan" value="<?= $d['satuan']; ?>" required>
    </div>

    <button type="submit" name="submit" style="background: rgba(34, 197, 94, 0.15); border: 2px solid rgba(34, 197, 94, 0.3); color: #86efac;">💾 Simpan Perubahan</button>
    <a href="bahan.php" class="btn" style="background: rgba(239, 68, 68, 0.15); border: 2px solid rgba(239, 68, 68, 0.3); color: #fca5a5;">❌ Batal</a>
</form>

<?php
if(isset($_POST['submit'])){
    $nama = $_POST['nama_bahan'];
    $stok = $_POST['stok'];
    $satuan = $_POST['satuan'];

    $update = mysqli_query($conn, "UPDATE Bahan_Baku SET nama_bahan='$nama', stok_saat_ini=$stok, satuan='$satuan' 
                                   WHERE id_bahan=$id");

    if($update){
        echo "<script>alert('Bahan berhasil diubah!'); window.location='bahan.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah bahan!');</script>";
    }
}
?>

<?php include '../footer.php'; ?>