<?php
$id = @$_GET['id'];
mysqli_query($koneksi,"DELETE FROM anggota WHERE id_anggota = '$id'") or die(mysqli_error());
?>
<script type="text/javascript">
	alert ("Data Berhasil Dihapus");
	window.location.href="index_manager.php?halaman=anggota";



</script>