<?php
include '../koneksi.php';

$id = $_GET['id'];
$delete = mysqli_query($conn, "DELETE FROM Pesanan WHERE id_pesanan=$id");

if($delete){
    echo "<script>alert('Pesanan berhasil dihapus!'); window.location='pesanan.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus pesanan!');</script>";
}
?>