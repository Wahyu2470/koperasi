<?php
$id = @$_GET['id'];
mysqli_query($koneksi,"DELETE FROM barang_dagang WHERE id_barang = '$id'") or die(mysqli_error());
mysqli_query($koneksi,"DELETE FROM barang_masuk WHERE id_barang = '$id'") or die(mysqli_error());
?>
<script type="text/javascript">
	alert ("Data Berhasil Dihapus");
	window.location.href="index_manager.php?halaman=barang_dagang";



</script>