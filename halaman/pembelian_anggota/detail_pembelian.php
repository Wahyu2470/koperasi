    <section id="main-content">
      <section class="wrapper">
        <h3> Data Pembelian Anggota</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <div class="float-right">
              </div>
              <?php 
              $id = @$_GET['id'];
              $sql = mysqli_query($koneksi,"SELECT *FROM pembelian_barang JOIN pembelian 
              ON pembelian_barang.id_pembelian=pembelian.id_pembelian JOIN barang_dagang 
              ON pembelian_barang.id_barang=barang_dagang.id_barang JOIN anggota 
              ON pembelian_barang.id_anggota=anggota.id_anggota 
              where pembelian_barang.id_pembelian = '$_GET[id]'") or die(mysqli_error());
              $data = mysqli_fetch_array($sql);
              ?>
              <!-- <div class="nav right">
                <a href="halaman/pembelian_anggota/cetak_pembelian.php?id=<?php echo $data['id_pembelian']; ?>" class="btn btn-danger" style="float: right;">
                  <i class="fa fa-print"> Cetak </i></a>
              </div> -->    
                <table class="table table-bordered table-striped table-condensed" id="example1">
                <br> 
                <thead align="center">
                  <tr align="center">
                  <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Pembelian Barang</th>
                    <th>Tanggal Pembelian</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $nomor=1;
              $sql = mysqli_query($koneksi,"SELECT *FROM pembelian_barang JOIN pembelian 
              ON pembelian_barang.id_pembelian=pembelian.id_pembelian JOIN barang_dagang 
              ON pembelian_barang.id_barang=barang_dagang.id_barang JOIN anggota 
              ON pembelian_barang.id_anggota=anggota.id_anggota 
              where pembelian_barang.id_pembelian = '$_GET[id]'") 
              or die(mysqli_error());?>
        <?php while ($data = $sql->fetch_assoc()) {?>
        <tr class="gradeX" align="center">
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $data['nama_anggota']; ?></td>
                    <td><?php echo $data['nama_barang']; ?></td>
                    <td>Rp. <?php echo number_format($data['total_harga']); ?></td>
                    <td><?php echo $data['tanggal_pembelian']; ?></td>
                    
                </tr>
                <?php 
                $nomor++;
                };?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>
</section>
