<?php
session_start();
$br_id = $_GET['id'];

if(isset($_SESSION['keranjang'][$br_id]))
{
	$_SESSION['keranjang'][$br_id]+=1;
}
else
{
	$_SESSION['keranjang'][$br_id] = 1;
}
 
//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";
echo "<script>alert('produk telah masuk ke keranjang belanjaan');</script>";
echo "<script>location='keranjang.php';</script>";
?>