<section id="main-content">
      <section class="wrapper">
        <h3> Data Barang Dagang</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <div class="float-right">
                <a href="index_manager.php?halaman=barang&aksi=tambah" class="btn btn-theme">
                  <i class="fa fa-edit">  Tambah Data </i></a>
              </div>
              <div class="nav right">
                <a href="barang_dagang/cetak_barang.php" class="btn btn-danger" style="float: right;">
                  <i class="fa fa-print"> Cetak </i></a>
              </div>    
                <table class="table table-bordered table-striped table-condensed" id="example1">
                <br> 
                <thead align="center">
                	<tr align="center">
                	<th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga Perkilo</th>
                    <th>Berat (KG)</th>
                    <th>Foto Barang</th>
                    <th>Settings</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                	$nomor=1;
					$sql = $koneksi->query("SELECT *FROM barang_dagang") or die(mysqli_error());?>
				<?php while ($data = $sql->fetch_assoc()) {?>
				<tr class="gradeX" align="center">
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $data['nama_barang']; ?></td>
                    <td>Rp.<?php echo number_format($data['harga_kilo']); ?></td>
                    <td><?php echo $data['jumlah_kilo']; ?>.Kg</td>
                    <td><img width="100px" src="../assets/img/barang/<?php echo $data['gambar_barang'] ?>"></td>
                    <td>
                    	<a href="index_manager.php?halaman=barang&aksi=edit&id=<?php echo $data['id_barang']; ?>" class="btn btn-theme"><i class="fa fa-cog"></i></a>
                    	<a href="index_manager.php?halaman=barang&aksi=delete&id=<?php echo $data['id_barang']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
</section>
</section>
