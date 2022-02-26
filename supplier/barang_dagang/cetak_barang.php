<?php
@session_start();
  // error_reporting(0);
include '../../config/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
  <meta name="description" content="This is an example dashboard created using build-in elements and components.">
  <title>Laporan Barang</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../asset/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../asset/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="../../asset/dist/css/skins/_all-skins.min.css">
   <!--charts js-->
   <script src="https://www.chartjs.org/dist/2.8.0/Chart.min.js"></script>
   <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
   <link href="../main.css" rel="stylesheet">
   <style type="text/css">
     h3{
      font-family: sans-serif;
    }
  </style>
</head>
<body>
  <div class="col-lg-12" style="padding: 10px;border-bottom: 1px solid #333;">
   <div class="kop row" >
    <div class="col-xs-2">
     <img src="../../img/logo1.png" style="width: 200px;">
   </div>
   <div class="col-xs-8 text-center" style="margin-left: 0; margin-top: 10px;">
     <h3 style="color: #111;"><b>Koperasi Pasar Kranji Baru Bekasi</b></h3>
     <h4 style="margin-top: -10px;margin-left: 3px;">Pasar Baru Kranji, Jl. Pemuda Pelopor Kranji No.1, RT.010/RW.006B, Jakasampurna, Kec. Bekasi Barat., Kota Bekasi, Jawa Barat 17145<br>
      Telp. 082113634144<br>
    </h4>
  </div>
</div>
</div>
<div class="table-responsive" style="padding: 10px;">
  <h3 class="text-center">Laporan Barang</h3>
  <table id="dariom" class="table table-bordered table-striped ">
    <thead>
      <tr align="center">
        <th rowspan="2" class="text-center">No.</th>
        <th rowspan="2" class="text-center">Nama Barang</th>
        <th rowspan="2" class="text-center">Jumlah Barang Masuk</th>
        <th rowspan="2" class="text-center">Tanggal Masuk</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $id_supplier=$_SESSION['supplier']['id_supplier'];
      $no=1;
      $sql = "SELECT *FROM barang_detail 
      JOIN barang_dagang ON barang_detail.id_barang=barang_dagang.id_barang 
      JOIN supplier ON barang_detail.id_supplier=supplier.id_supplier 
      WHERE barang_detail.id_supplier='$id_supplier'";
      $query = mysqli_query($koneksi, $sql) or die (mysqli_error($koneksi));
      while ($row = mysqli_fetch_array($query)):
       ?>
       <tr align="center">
        <td><?php echo $no++; ?></td>
        <td><?= $row['nama_barang'] ?></td>
        <td><?= $row['jumlah_detail'] ?>.Kg</td>
        <td><?= $row['tanggal_masuk'] ?></td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>
</div>
</div>
<div class="col-lg-12">
  <span class="pull-right text-center">
    <p>Menyetujui</p>
    <p><?php echo date('l, d F Y');?></p>
    <p>Supplier</p>
    <br><br><br>
    <strong style="text-decoration: underline;"><?= $_SESSION['nama'] ?></strong>
    
  </span>
</div>
</div>
<script type="text/javascript">
  window.print();
</script>
</body>