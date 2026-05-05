<?php include 'header.php'; ?>
<?php include 'koneksi.php'; ?>

<h1>📊 Dashboard Ayam Geprek</h1>

<div class="dashboard-grid">
    <div class="card">
        <h3>🍗 Total Menu</h3>
        <?php
            $menu = mysqli_query($conn, "SELECT COUNT(*) as total FROM Menu");
            $m = mysqli_fetch_array($menu);
            echo '<p style="font-size: 2rem; color: #a7f3d0; font-weight: bold;">' . $m['total'] . '</p>';
        ?>
        <p>Menu yang tersedia</p>
    </div>

    <div class="card">
        <h3>📦 Total Bahan</h3>
        <?php
            $bahan = mysqli_query($conn, "SELECT COUNT(*) as total FROM Bahan_Baku");
            $b = mysqli_fetch_array($bahan);
            echo '<p style="font-size: 2rem; color: #a7f3d0; font-weight: bold;">' . $b['total'] . '</p>';
        ?>
        <p>Bahan baku di gudang</p>
    </div>

    <div class="card">
        <h3>🛒 Total Pesanan</h3>
        <?php
            $pesanan = mysqli_query($conn, "SELECT COUNT(*) as total FROM Pesanan");
            $p = mysqli_fetch_array($pesanan);
            echo '<p style="font-size: 2rem; color: #a7f3d0; font-weight: bold;">' . $p['total'] . '</p>';
        ?>
        <p>Pesanan hari ini</p>
    </div>
</div>

<?php include 'footer.php'; ?>