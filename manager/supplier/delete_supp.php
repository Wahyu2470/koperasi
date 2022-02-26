<?php
$id = @$_GET['id'];
mysqli_query($koneksi,"DELETE FROM supplier WHERE id_supplier = '$id'") or die(mysqli_error());
?>
<script type="text/javascript">
	alert ("Data Berhasil Dihapus");
	window.location.href="index_manager.php?halaman=supplier";



</script>