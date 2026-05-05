<?php
include '../koneksi.php';

$id = $_GET['id'];
$delete = mysqli_query($conn, "DELETE FROM Bahan_Baku WHERE id_bahan=$id");

if($delete){
    echo "<script>alert('Bahan berhasil dihapus!'); window.location='bahan.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus bahan!');</script>";
}
?>