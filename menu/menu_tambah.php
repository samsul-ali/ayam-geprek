<?php include '../header.php'; ?>
<?php include '../koneksi.php'; ?>

<h2>➕ Tambah Menu Baru</h2>

<form method="POST">
    <div style="margin-bottom: 15px;">
        <label style="color: white; display: block; margin-bottom: 8px;">Nama Menu</label>
        <input type="text" name="nama_menu" placeholder="Masukkan nama menu" required>
    </div>

    <div style="margin-bottom: 15px;">
        <label style="color: white; display: block; margin-bottom: 8px;">Harga</label>
        <input type="number" name="harga" placeholder="Masukkan harga" required>
    </div>

    <div style="margin-bottom: 15px;">
        <label style="color: white; display: block; margin-bottom: 8px;">Kategori</label>
        <select name="id_kategori" required>
            <option value="">-- Pilih Kategori --</option>
            <?php
            $kategori = mysqli_query($conn, "SELECT * FROM Kategori_Menu");
            while($k = mysqli_fetch_array($kategori)){
                echo "<option value='".$k['id_kategori']."'>".$k['nama_kategori']."</option>";
            }
            ?>
        </select>
    </div>

    <button type="submit" name="submit" style="background: rgba(34, 197, 94, 0.15); border: 2px solid rgba(34, 197, 94, 0.3); color: #86efac;">💾 Simpan</button>
    <a href="menu.php" class="btn" style="background: rgba(239, 68, 68, 0.15); border: 2px solid rgba(239, 68, 68, 0.3); color: #fca5a5;">❌ Batal</a>
</form>

<?php
if(isset($_POST['submit'])){
    $nama = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $kategori = $_POST['id_kategori'];

    $insert = mysqli_query($conn, "INSERT INTO Menu (nama_menu, harga, id_kategori) 
                                   VALUES ('$nama', $harga, $kategori)");

    if($insert){
        echo "<script>alert('Menu berhasil ditambahkan!'); window.location='menu.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan menu!');</script>";
    }
}
?>

<?php include '../footer.php'; ?>