<?php
include '../koneksi.php';

$id = $_GET['id'];
$delete = mysqli_query($conn, "DELETE FROM Menu WHERE id_menu=$id");

if($delete){
    echo "<script>alert('Menu berhasil dihapus!'); window.location='menu.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus menu!');</script>";
}
?>