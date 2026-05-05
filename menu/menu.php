<?php include '../header.php'; ?>
<?php include '../koneksi.php'; ?>

<h2>🍽️ Data Menu</h2>

<!-- Tombol Tambah -->
<div style="text-align: center; margin: 20px 0;">
    <a href="menu_tambah.php" class="btn" style="background: rgba(34, 197, 94, 0.15); border: 2px solid rgba(34, 197, 94, 0.3); color: #86efac;">➕ Tambah Menu Baru</a>
</div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Menu</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $data = mysqli_query($conn, "SELECT m.*, k.nama_kategori FROM Menu m 
                                    LEFT JOIN Kategori_Menu k ON m.id_kategori = k.id_kategori");
        $no = 1;
        while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d['nama_menu']; ?></td>
            <td>Rp <?= number_format($d['harga'], 0, ',', '.'); ?></td>
            <td><?= $d['nama_kategori'] ?? 'N/A'; ?></td>
            <td>
                <a href="menu_edit.php?id=<?= $d['id_menu']; ?>" class="btn btn-edit">✏️ Edit</a>
                <a href="menu_hapus.php?id=<?= $d['id_menu']; ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus?')">🗑️ Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php include '../footer.php'; ?>