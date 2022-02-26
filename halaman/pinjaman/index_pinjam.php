    <section id="main-content">
      <section class="wrapper">
        <h3> Data Pinjaman Anggota Koperasi</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <div>
                <a href="index.php?halaman=pinjaman&aksi=tambah" class="btn btn-theme" style="float: left;">
                  <i class="fa fa-edit"> Tambah Data </i></a>
              </div>
              <div class="nav right">
                <a href="halaman/pinjaman/cetak_pinjam.php" class="btn btn-danger" style="float: right;">
                  <i class="fa fa-print"> Cetak </i></a>
              </div>    
                <table class="table table-bordered table-striped table-condensed" id="example1">
                <br> 
                <thead align="center">
                    <tr align="center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Jumlah Pinjaman</th>
                    <th>Angsuran</th>
                    <th>Bunga</th>
                    <th>Settings</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    $nomor=1;
                    $sql = $koneksi->query("SELECT *FROM pinjaman_anggota 
                    JOIN anggota ON pinjaman_anggota.id_anggota = anggota.id_anggota 
                    JOIN pinjaman_detail ON pinjaman_anggota.id_pinjam=pinjaman_detail.id_pinjam") 
                    or die(mysqli_error($koneksi));?>
                <?php while ($data = $sql->fetch_assoc()) {?>
                <tr class="gradeX" align="center">
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $data['nama_anggota']; ?></td>
                    <td><?php echo $data['tgl']; ?></td>
                    <td>Rp.<?php echo number_format($data['jumlah']); ?>.00</td>
                    <td>Rp.<?php echo number_format($data['angsuran']); ?>.00</td>
                    <td><?php echo number_format($data['bunga']); ?>%</td>
                    <td>
                        <a href="index.php?halaman=pinjaman&aksi=edit&id=<?php echo $data['id_pinjaman']; ?>" class="btn btn-theme"><i class="fa fa-cog"></i></a>
                        <a href="index.php?halaman=pinjaman&aksi=delete&id=<?php echo $data['id_pinjaman']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
