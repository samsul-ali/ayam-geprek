<?php include '../header.php'; ?>
<?php include '../koneksi.php'; ?>

<h2>📦 Data Bahan Baku</h2>

<!-- Tombol Tambah -->
<div style="text-align: center; margin: 20px 0;">
    <a href="bahan_tambah.php" class="btn" style="background: rgba(34, 197, 94, 0.15); border: 2px solid rgba(34, 197, 94, 0.3); color: #86efac;">➕ Tambah Bahan</a>
</div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Bahan</th>
            <th>Stok Saat Ini</th>
            <th>Satuan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $data = mysqli_query($conn, "SELECT * FROM Bahan_Baku");
        $no = 1;
        while($d = mysqli_fetch_array($data)){
            $status = $d['stok_saat_ini'] > 10 ? 'Tersedia' : 'Terbatas';
            $badge = $d['stok_saat_ini'] > 10 ? 'badge-stok-tinggi' : 'badge-stok-rendah';
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d['nama_bahan']; ?></td>
            <td><?= $d['stok_saat_ini']; ?></td>
            <td><?= $d['satuan']; ?></td>
            <td><span class="badge <?= $badge; ?>"><?= $status; ?></span></td>
            <td>
                <a href="bahan_edit.php?id=<?= $d['id_bahan']; ?>" class="btn btn-edit">✏️ Edit</a>
                <a href="bahan_hapus.php?id=<?= $d['id_bahan']; ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus?')">🗑️ Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php include '../footer.php'; ?>