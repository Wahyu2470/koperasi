<?php 
// menghubungkan dengan koneksi
include '../../config/koneksi.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
// error_reporting(0);
?>

<?php

// upload file xls
$target = basename($_FILES['filekebutuhan']['name']) ;
move_uploaded_file($_FILES['filekebutuhan']['tmp_name'], $target);
 
// beri permisi agar file xls dapat di baca
chmod($_FILES['filekebutuhan']['name'],0777);
 
// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filekebutuhan']['name'],false);
// menghitung jumlah baris data yang ada																																																												
$jumlah_baris = $data->rowcount($sheet_index=0);
 
// jumlah default data yang berhasil di import
	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){
	$no     	= $data->val($i, 1);
	$id_anggota = $data->val($i, 2);
	$nama  	= $data->val($i, 3);
	$tanggal_pembelian = $data->val($i, 4);
	$id_barang 	= $data->val($i, 5);
	$jumlah_barang	= $data->val($i, 6);
  $total_pembelian = $data->val($i, 7);

    if($id_anggota != "" && $nama != "" && $tanggal_pembelian != "" && $id_pembelian != "" && $jumlah_barang != "" && $total_pembelian != ""){
      }else{
         $koneksi->query("INSERT INTO pembelian (id_anggota,nama,tanggal_pembelian,total_pembelian) 
        values('$id_anggota','$nama','$tanggal_pembelian','$total_pembelian')");

        $keranjang = $koneksi->insert_id;

        $koneksi->query("INSERT INTO pembelian_barang (id_pembelian,id_anggota,id_barang,total_harga,jumlah_barang) 
        Values('$keranjang', '$id_anggota', '$id_barang','$total_pembelian', '$jumlah_barang')");
      
      }
  $berhasil++;
}
// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filekebutuhan']['name']);
// alihkan halaman ke index.php
echo"<script>alert('Data Berhasil Di Upload.');
	window.location.href='../../index.php?halaman=kebutuhan'</script>";
?>