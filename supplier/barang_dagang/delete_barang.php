<?php
$id = @$_GET['id'];
mysqli_query($koneksi,"DELETE FROM barang_detail WHERE id_detail_barang = '$id'") or die(mysqli_error());
?>
<script type="text/javascript">
	alert ("Data Berhasil Dihapus");
	window.location.href="index_supplier.php?halaman=barang";



</script>