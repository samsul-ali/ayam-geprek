<?php include '../header.php'; ?>
<?php include '../koneksi.php'; ?>

<h2>➕ Pesanan Baru</h2>

<form method="POST">
    <div style="margin-bottom: 15px;">
        <label style="color: white; display: block; margin-bottom: 8px;">Tanggal & Jam</label>
        <input type="datetime-local" name="tgl_jam" required>
    </div>

    <div style="margin-bottom: 15px;">
        <label style="color: white; display: block; margin-bottom: 8px;">Nomor Meja</label>
        <select name="id_meja" required>
            <option value="">-- Pilih Meja --</option>
            <?php
            $meja = mysqli_query($conn, "SELECT * FROM Meja");
            while($m = mysqli_fetch_array($meja)){
                echo "<option value='".$m['id_meja']."'>Meja ".$m['nomor_meja']."</option>";
            }
            ?>
        </select>
    </div>

    <div style="margin-bottom: 15px;">
        <label style="color: white; display: block; margin-bottom: 8px;">Karyawan</label>
        <select name="id_karyawan" required>
            <option value="">-- Pilih Karyawan --</option>
            <?php
            $karyawan = mysqli_query($conn, "SELECT * FROM Karyawan");
            while($k = mysqli_fetch_array($karyawan)){
                echo "<option value='".$k['id_karyawan']."'>".$k['nama_karyawan']."</option>";
            }
            ?>
        </select>
    </div>

    <div style="margin-bottom: 15px;">
        <label style="color: white; display: block; margin-bottom: 8px;">Status Pembayaran</label>
        <select name="status_bayar" required>
            <option value="Belum Bayar">⏳ Belum Bayar</option>
            <option value="Lunas">✓ Lunas</option>
        </select>
    </div>

    <button type="submit" name="submit" style="background: rgba(34, 197, 94, 0.15); border: 2px solid rgba(34, 197, 94, 0.3); color: #86efac;">💾 Simpan</button>
    <a href="pesanan.php" class="btn" style="background: rgba(239, 68, 68, 0.15); border: 2px solid rgba(239, 68, 68, 0.3); color: #fca5a5;">❌ Batal</a>
</form>

<?php
if(isset($_POST['submit'])){
    $tgl_jam = $_POST['tgl_jam'];
    $meja = $_POST['id_meja'];
    $karyawan = $_POST['id_karyawan'];
    $status = $_POST['status_bayar'];

    $insert = mysqli_query($conn, "INSERT INTO Pesanan (tgl_jam, id_meja, id_karyawan, status_bayar) 
                                   VALUES ('$tgl_jam', $meja, $karyawan, '$status')");

    if($insert){
        echo "<script>alert('Pesanan berhasil ditambahkan!'); window.location='pesanan.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan pesanan!');</script>";
    }
}
?>

<?php include '../footer.php'; ?>