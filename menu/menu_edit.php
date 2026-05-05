<?php include '../header.php'; ?>
<?php include '../koneksi.php'; ?>

<h2>✏️ Edit Menu</h2>

<?php
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM Menu WHERE id_menu = $id");
$d = mysqli_fetch_array($data);
?>

<form method="POST">
    <div style="margin-bottom: 15px;">
        <label style="color: white; display: block; margin-bottom: 8px;">Nama Menu</label>
        <input type="text" name="nama_menu" value="<?= $d['nama_menu']; ?>" required>
    </div>

    <div style="margin-bottom: 15px;">
        <label style="color: white; display: block; margin-bottom: 8px;">Harga</label>
        <input type="number" name="harga" value="<?= $d['harga']; ?>" required>
    </div>

    <div style="margin-bottom: 15px;">
        <label style="color: white; display: block; margin-bottom: 8px;">Kategori</label>
        <select name="id_kategori" required>
            <?php
            $kategori = mysqli_query($conn, "SELECT * FROM Kategori_Menu");
            while($k = mysqli_fetch_array($kategori)){
                $selected = $k['id_kategori'] == $d['id_kategori'] ? 'selected' : '';
                echo "<option value='".$k['id_kategori']."' $selected>".$k['nama_kategori']."</option>";
            }
            ?>
        </select>
    </div>

    <button type="submit" name="submit" style="background: rgba(34, 197, 94, 0.15); border: 2px solid rgba(34, 197, 94, 0.3); color: #86efac;">💾 Simpan Perubahan</button>
    <a href="menu.php" class="btn" style="background: rgba(239, 68, 68, 0.15); border: 2px solid rgba(239, 68, 68, 0.3); color: #fca5a5;">❌ Batal</a>
</form>

<?php
if(isset($_POST['submit'])){
    $nama = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $kategori = $_POST['id_kategori'];

    $update = mysqli_query($conn, "UPDATE Menu SET nama_menu='$nama', harga=$harga, id_kategori=$kategori 
                                   WHERE id_menu=$id");

    if($update){
        echo "<script>alert('Menu berhasil diubah!'); window.location='menu.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah menu!');</script>";
    }
}
?>

<?php include '../footer.php'; ?>