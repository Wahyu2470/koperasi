<?php
    require_once("../config/koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    }
    $id_barang = $_GET['id']; 
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
             
       if ($act == "plus") {
            if (isset($_SESSION['keranjang'][$id_barang])) {
                if (isset($_SESSION['keranjang'][$id_barang])) {
                    $_SESSION['keranjang'][$id_barang] += 1;
                    echo "<script>alert('produk sudah di tambah');</script>";
					echo "<script>location='keranjang.php';</script>";
                }
            }
        } elseif ($act == "min") {
            if (isset($_SESSION['keranjang'][$id_barang])) {
                if (isset($_SESSION['keranjang'][$id_barang])) {
                    $_SESSION['keranjang'][$id_barang] -= 1;
                    echo "<script>alert('produk telah dikurangi');</script>";
					echo "<script>location='keranjang.php';</script>";
                }
            }
        }  
         
        echo "<script></script>";
    }   
     
?>