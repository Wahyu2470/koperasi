<?php
$id = @$_GET['id'];
mysqli_query($koneksi,"DELETE FROM pinjaman WHERE id_pinjaman = '$id'") or die(mysqli_error());
?>
<script type="text/javascript">
	alert ("Data Berhasil Dihapus");
	window.location.href="index_manager.php?halaman=pinjaman";



</script>