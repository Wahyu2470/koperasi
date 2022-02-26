<?php
$id = @$_GET['id'];
mysqli_query($koneksi,"DELETE FROM pinjaman_anggota WHERE id_pinjam = '$id'") or die(mysqli_error());
mysqli_query($koneksi,"DELETE FROM pinjaman_detail WHERE id_pinjam = '$id'") 
or die(mysqli_error());

?>
<script type="text/javascript">
	alert ("Data Berhasil Dihapus");
	window.location.href="index.php?halaman=pinjaman";



</script>