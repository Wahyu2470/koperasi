<?php
$id = @$_GET['id'];
mysqli_query($koneksi,"DELETE FROM user WHERE id_user = '$id'") or die(mysqli_error());
?>
<script type="text/javascript">
	alert ("Data Berhasil Dihapus");
	window.location.href="index.php?halaman=user";



</script>