<?php
session_start();
$br_id = $_GET['id'];
unset($_SESSION['keranjang'][$br_id]);

echo "<script>alert('produk dihapus dari keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
?>