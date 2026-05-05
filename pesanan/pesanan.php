<?php include '../header.php'; ?>
<?php include '../koneksi.php'; ?>

<h2>🛒 Data Pesanan</h2>

<!-- Tombol Tambah -->
<div style="text-align: center; margin: 20px 0;">
    <a href="pesanan_tambah.php" class="btn" style="background: rgba(34, 197, 94, 0.15); border: 2px solid rgba(34, 197, 94, 0.3); color: #86efac;">➕ Pesanan Baru</a>
</div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>ID Pesanan</th>
            <th>Tanggal & Jam</th>
            <th>Meja</th>
            <th>Status Bayar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $data = mysqli_query($conn, "SELECT p.*, m.nomor_meja FROM Pesanan p 
                                    LEFT JOIN Meja m ON p.id_meja = m.id_meja");
        $no = 1;
        while($d = mysqli_fetch_array($data)){
            $status_badge = $d['status_bayar'] == 'Lunas' ? 'badge-lunas' : 'badge-belum';
            $status_text = $d['status_bayar'] == 'Lunas' ? '✓ Lunas' : '⏳ Belum Bayar';
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d['id_pesanan']; ?></td>
            <td><?= date('d/m/Y H:i', strtotime($d['tgl_jam'])); ?></td>
            <td>Meja <?= $d['nomor_meja'] ?? 'N/A'; ?></td>
            <td><span class="badge <?= $status_badge; ?>"><?= $status_text; ?></span></td>
            <td>
                <a href="pesanan_edit.php?id=<?= $d['id_pesanan']; ?>" class="btn btn-edit">✏️ Edit</a>
                <a href="pesanan_hapus.php?id=<?= $d['id_pesanan']; ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus?')">🗑️ Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php include '../footer.php'; ?>