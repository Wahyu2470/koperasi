    <section id="main-content">
      <section class="wrapper">
        <h3> Data Simpanan Anggota Koperasi</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <div>
                <a href="index.php?halaman=simpanan&aksi=tambah" class="btn btn-theme" style="float: left;">
                  <i class="fa fa-edit"> Tambah Data </i></a>
              </div>
              <div class="nav right">
                <a href="halaman/simpanan/cetak_simpan.php" class="btn btn-danger" style="float: right;">
                  <i class="fa fa-print"> Cetak </i></a>
              </div>    
                <table class="table table-bordered table-striped table-condensed" id="example1">
                <br> 
                <thead align="center">
                    <tr align="center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jumlah Simpanan</th>
                    <th>Jenis Simpanan</th>
                    <th>Settings</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    $nomor=1;
                    $sql = $koneksi->query("SELECT * FROM simpanan 
                    JOIN anggota ON simpanan.id_anggota = anggota.id_anggota 
                    JOIN jenis_simpanan ON simpanan.id_jenis_simpanan=jenis_simpanan.id_jenis_simpanan") or die(mysqli_error());?>
                <?php while ($data = $sql->fetch_assoc()) {?>
                <tr class="gradeX" align="center">
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $data['nama_anggota']; ?></td>
                    <td>Rp.<?php echo number_format($data['jumlah_simpan']); ?>.00</td>
                    <td><?php echo $data['jenis_simpanan']; ?></td>
                    <td>
                        <a href="index.php?halaman=simpanan&aksi=edit&id=<?php echo $data['id_simpanan']; ?>" class="btn btn-theme"><i class="fa fa-cog"></i></a>
                        <a href="index.php?halaman=simpanan&aksi=delete&id=<?php echo $data['id_simpanan']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
