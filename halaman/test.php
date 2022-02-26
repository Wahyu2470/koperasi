<?php
include '../config/koneksi.php';
  
?>
<!DOCTYPE html>
<html>
<head>
 <title>Tutorial PHP</title>

 <!-- Bootstrap -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
 
 <div class="container mt-5">
  <center>
   <h1>PlajariKode</h1>
   <h3>Menampilkan data berdasarkan periode tanggal dengan PHP</h3>
  </center>

  <div class="card col-md-8 mx-auto mt-3">
   <div class="card-body">
    <div class="row">
     <div class="col-md-4 pt-2">
      <span>Jumlah data: <b></b></span>
     </div>
     <div class="col-md-8">
     </div>
    </div>

    <div class="mt-3" style="max-height: 340px; overflow-y: auto;">
     <table class="table table-bordered">
      <tr>
       <th>#</th>
       <th>Bulan</th>
       <th>Nama Barang</th>
       <th>Jumlah Barang Masuk</th>
       <th>Jumlah Barang Keluar</th>
       
      </tr>

      <?php
     $min=mysqli_fetch_array(mysqli_query($koneksi,"SELECT min(tanggal_masuk) as tanggal1 from barang_detail"));
     $max=mysqli_fetch_array(mysqli_query($koneksi,"SELECT max(tanggal_masuk) as tanggal2 from barang_detail"));
     $bulan =  date_format(date_create($min['tanggal1']),"m");
     $tahun =  date_format(date_create($min['tanggal1']),"Y");
     $n=1;
        do {
          unset($ST1);
          if ($bulan == 8) {
              $bulan=1;
              $tahun++;
          }
          $sbulan= $bulan < 10 ? "0".$bulan :  $bulan;
          $sbulan = str_replace("00","0",$sbulan);
          $sql="SELECT barang_dagang.nama_barang, barang_detail.id_barang, barang_detail.jumlah_detail AS jumlah_barang FROM barang_dagang JOIN barang_detail ON barang_dagang.id_barang=barang_detail.id_barang where barang_detail.tanggal_masuk like '%".$tahun."-".$sbulan."%'";
     
       $bulanan=mysqli_fetch_array(mysqli_query($koneksi,$sql));
       echo"<tr>";
       echo "<td>" . $n . "</td>";
       echo "<td>" . $bulanan['nama_barang'] ."</td>";
       echo "<td>".bulan($bulan)." ".$tahun."</td>";
       echo "<td>";
       echo $bulanan['jumlah_barang'] != null ? number_format($bulanan['jumlah_barang']) : "<i class='text-muted'>0</i>";
       echo "</td>";

  ?>
<?php
echo "</tr>"  ;
$n++;
$bulan++;
 } while ($n<=8);?>
      

     </table>
    </div>
   </div>
  </div>
 </div>

</body>
</html>