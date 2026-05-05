<?php
$conn = mysqli_connect("localhost", "root", "", "ayam_geprek");

if(!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>