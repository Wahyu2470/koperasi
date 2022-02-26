<?php
$id = @$_GET['id'];
mysqli_query($koneksi,"DELETE FROM iuran_detail WHERE id_iuran = '$id'") or die(mysqli_error());
?>
<script type="text/javascript">
	alert ("Data Berhasil Dihapus");
	window.location.href="index.php?halaman=iuran";



</script>