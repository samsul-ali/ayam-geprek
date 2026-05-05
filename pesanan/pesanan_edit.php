<?php include '../header.php'; ?>
<?php include '../koneksi.php'; ?>

<h2>✏️ Edit Pesanan</h2>

<?php
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM Pesanan WHERE id_pesanan = $id");
$d = mysqli_fetch_array($data);
?>

<form method="POST">
    <div style="margin-bottom: 15px;">
        <label style="color: white; display: block; margin-bottom: 8px;">Tanggal & Jam</label>
        <input type="datetime-local" name="tgl_jam" value="<?= date('Y-m-d\TH:i', strtotime($d['tgl_jam'])); ?>" required>
    </div>

    <div style="margin-bottom: 15px;">
        <label style="color: white; display: block; margin-bottom: 8px;">Nomor Meja</label>
        <select name="id_meja" required>
            <?php
            $meja = mysqli_query($conn, "SELECT * FROM Meja");
            while($m = mysqli_fetch_array($meja)){
                $selected = $m['id_meja'] == $d['id_meja'] ? 'selected' : '';
                echo "<option value='".$m['id_meja']."' $selected>Meja ".$m['nomor_meja']."</option>";
            }
            ?>
        </select>
    </div>

    <div style="margin-bottom: 15px;">
        <label style="color: white; display: block; margin-bottom: 8px;">Karyawan</label>
        <select name="id_karyawan" required>
            <?php
            $karyawan = mysqli_query($conn, "SELECT * FROM Karyawan");
            while($k = mysqli_fetch_array($karyawan)){
                $selected = $k['id_karyawan'] == $d['id_karyawan'] ? 'selected' : '';
                echo "<option value='".$k['id_karyawan']."' $selected>".$k['nama_karyawan']."</option>";
            }
            ?>
        </select>
    </div>

    <div style="margin-bottom: 15px;">
        <label style="color: white; display: block; margin-bottom: 8px;">Status Pembayaran</label>
        <select name="status_bayar" required>
            <option value="Belum Bayar" <?= $d['status_bayar'] == 'Belum Bayar' ? 'selected' : ''; ?>>⏳ Belum Bayar</option>
            <option value="Lunas" <?= $d['status_bayar'] == 'Lunas' ? 'selected' : ''; ?>>✓ Lunas</option>
        </select>
    </div>

    <button type="submit" name="submit" style="background: rgba(34, 197, 94, 0.15); border: 2px solid rgba(34, 197, 94, 0.3); color: #86efac;">💾 Simpan Perubahan</button>
    <a href="pesanan.php" class="btn" style="background: rgba(239, 68, 68, 0.15); border: 2px solid rgba(239, 68, 68, 0.3); color: #fca5a5;">❌ Batal</a>
</form>

<?php
if(isset($_POST['submit'])){
    $tgl_jam = $_POST['tgl_jam'];
    $meja = $_POST['id_meja'];
    $karyawan = $_POST['id_karyawan'];
    $status = $_POST['status_bayar'];

    $update = mysqli_query($conn, "UPDATE Pesanan SET tgl_jam='$tgl_jam', id_meja=$meja, id_karyawan=$karyawan, status_bayar='$status' 
                                   WHERE id_pesanan=$id");

    if($update){
        echo "<script>alert('Pesanan berhasil diubah!'); window.location='pesanan.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah pesanan!');</script>";
    }
}
?>

<?php include '../footer.php'; ?>