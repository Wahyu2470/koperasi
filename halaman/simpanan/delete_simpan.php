<?php
$id = @$_GET['id'];
mysqli_query($koneksi,"DELETE FROM simpan WHERE id_simpanan = '$id'") or die(mysqli_error());
?>
<script type="text/javascript">
	alert ("Data Berhasil Dihapus");
	window.location.href="index.php?halaman=simpanan";



</script>