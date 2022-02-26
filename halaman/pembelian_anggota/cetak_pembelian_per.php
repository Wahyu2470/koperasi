<?php
@session_start();
  // error_reporting(0);
include '../../config/koneksi.php';
$id_pembelian=$_GET['id'];
$sql = $koneksi->query("SELECT *FROM pembelian_barang JOIN pembelian 
             ON pembelian_barang.id_pembelian=pembelian.id_pembelian JOIN barang_dagang 
             ON pembelian_barang.id_barang=barang_dagang.id_barang JOIN anggota ON pembelian_barang.id_anggota=anggota.id_anggota WHERE pembelian.id_pembelian=$id_pembelian") or die(mysqli_error($koneksi));
while ($data = mysqli_fetch_array($sql)){
?>
<!DOCTYPE html>
<html>
<head>
  <link href="../../img/logo1.png" rel="icon">
  <link href="../../img/apple-touch-icon.png" rel="apple-touch-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
  <meta name="description" content="This is an example dashboard created using build-in elements and components.">
  <title>Laporan Pembelian Anggota</title>
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
  <h3 class="text-center">Laporan Pembelian <?php echo $data['nama_anggota']?></h3>
  <h4 class="text-center">Pada Tanggal <?php echo $data['tanggal_pembelian']?></h4>
  <table id="dariom" class="table table-bordered table-striped ">
    <thead>
      <tr>
        <th rowspan="2" class="text-center">No.</th>
        
        <!-- <th rowspan="2" class="text-center">Tanggal Pembelian</th> -->
        <th rowspan="2" class="text-center">Barang</th>
        <th rowspan="2" class="text-center">Jumlah Pembelian</th>
        <th rowspan="2" class="text-center">Total</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $no=1;
      $sql = $koneksi->query("SELECT *FROM pembelian_barang JOIN pembelian 
             ON pembelian_barang.id_pembelian=pembelian.id_pembelian JOIN barang_dagang 
             ON pembelian_barang.id_barang=barang_dagang.id_barang JOIN anggota ON pembelian_barang.id_anggota=anggota.id_anggota WHERE pembelian.id_pembelian=$id_pembelian") or die(mysqli_error($koneksi));
       while ($row = mysqli_fetch_array($sql)):
       ?>
       <tr>
        <td><?php echo $no++; ?></td>
        <!-- <td><?= $row['nama_anggota'] ?></td> -->
        <!-- <td><?= $row['tanggal_pembelian'] ?></td> -->
        <td><?= $row['nama_barang'] ?></td>
        <td><?= $row['jumlah_barang'] ?></td>
        <td>Rp.<?php echo number_format($row['total_harga']); ?>.00</td>
      </tr>
    <?php endwhile; ?>
    <?php
     $sql = $koneksi->query("SELECT SUM(total_harga) FROM pembelian_barang WHERE id_pembelian=$id_pembelian;") or die(mysqli_error($koneksi));
            $data = $sql->fetch_array();
            $jumlah = $data['SUM(total_harga)'];
    ?>
        <td colspan="3i" align="center">Total Semua</td>
        <td> Rp. <?php echo number_format($jumlah) ;?> .00</td>
      </tr>
  </tbody>
</table>
</div>
</div>
<div class="col-lg-12">
  <span class="pull-right text-center">
    <p>Menyetujui</p>
    <p><?php echo date('l, d F Y');?></p>
    <p>Ketua Koperasi</p>
    <br><br><br>
    <strong style="text-decoration: underline;">Aminudin</strong>
    
  </span>
</div>
</div>
<script type="text/javascript">
  window.print();
</script>
</body>
  <?php }?>