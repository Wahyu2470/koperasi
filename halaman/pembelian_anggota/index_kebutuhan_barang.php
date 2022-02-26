    <section id="main-content">
      <section class="wrapper">
        <h3> Data Kebutuhan Anggota</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <div class="float-right">
              </div>
              <form style="margin-top: 10px;" method="post" enctype="multipart/form-data" action="halaman/upload_excel/upload_data_barang.php">
                  <div style="float: left;">
                    <h6>Upload Data Barang By Excel</h6>
                     <input name="filekebutuhan" type="file" required="required"><br>
                     <input name="upload" type="submit" value="Upload Data Barang" class="btn  btn-theme">
                  </div>
               </form>
              <div class="nav right">
                <a href="halaman/pembelian_anggota/cetak_pembelian.php" class="btn btn-danger" style="float: right;">
                  <i class="fa fa-print"> Cetak </i></a>
              </div>
              <div class="adv-table">    
                <table class="display table table-bordered" id="hidden-table-info">
                <br> 
                <thead align="center">
                	<tr align="center">
                	<th>No</th>
                    <th>Nama Anggota</th>
                    <!-- <th>Nama Barang</th> -->
                    <!-- <th>Jumlah Pembelian Barang</th> -->
                    <th>Tanggal Pembelian</th>
                    <th>Settings</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                	$nomor=1;
					$sql = $koneksi->query("SELECT *FROM pembelian_barang 
                            JOIN pembelian ON pembelian_barang.id_pembelian=pembelian.id_pembelian
                            JOIN barang_dagang ON pembelian_barang.id_barang=barang_dagang.id_barang 
                            JOIN anggota ON pembelian_barang.id_anggota=anggota.id_anggota 
                            GROUP BY pembelian.id_pembelian") or die(mysqli_error($koneksi));?>
				<?php while ($data = $sql->fetch_assoc()) {?>
				<tr class="gradeX" align="center">
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $data['nama_anggota']; ?></td>
                    <!-- <td><?php echo $data['nama_barang']; ?></td> -->
                    <!-- <td><?php echo $data['jumlah_barang']; ?>.Kg</td> -->
                    <td><?php echo $data['tanggal_pembelian']; ?></td>
                    <td>
                    	<a href="index.php?halaman=kebutuhan&aksi=detail&id=<?php echo $data['id_pembelian']; ?>" class="btn btn-theme"><i class="fa fa-list"></i></a>
                      <a href="halaman/pembelian_anggota/cetak_pembelian_per.php?id=<?php echo $data['id_pembelian']; ?>" class="btn btn-danger">
                      <i class="fa fa-print"> </i></a>
                    	
                    </td>
                </tr>
                <?php 
                $nomor++;
                };?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</section>
</section>
