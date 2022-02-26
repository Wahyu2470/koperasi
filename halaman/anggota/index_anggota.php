    <section id="main-content">
      <section class="wrapper">
        <h3> Data Anggota Koperasi</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <div class="float-right">
                <a href="index.php?halaman=anggota&aksi=tambah" class="btn btn-theme">
                  <i class="fa fa-edit">  Tambah Data </i></a>
              </div>    
                <table class="table table-bordered table-striped table-condensed" id="example1">
                <br> 
                <thead align="center">
                    <tr align="center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Alamat</th>
                    <th>Foto</th>
                    <th>Settings</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    $nomor=1;
                    $sql = $koneksi->query("SELECT *FROM anggota") or die(mysqli_error());?>
                <?php while ($data = $sql->fetch_assoc()) {?>
                <tr class="gradeX" align="center">
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $data['nama_anggota']; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td><img width="100px" src="assets/img/identitas/<?php echo $data['foto_anggota'] ?>"></td>
                    <td>
                        <a href="index.php?halaman=anggota&aksi=edit&id=<?php echo $data['id_anggota']; ?>" class="btn btn-theme"><i class="fa fa-cog"></i></a>
                        <a href="index.php?halaman=anggota&aksi=delete&id=<?php echo $data['id_anggota']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
