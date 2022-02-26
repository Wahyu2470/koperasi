    <section id="main-content">
      <section class="wrapper">
        <h3> Data Supplier Koperasi</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <div class="float-right">
                <a href="index_manager.php?halaman=supplier&aksi=tambah" class="btn btn-theme">
                  <i class="fa fa-edit"> Data Supplier </i></a>
              </div>    
                <table class="table table-bordered table-striped table-condensed" id="example1">
                <br> 
                <thead align="center">
                    <tr align="center">
                    <th>No</th>
                    <th>Nama Supplier</th>
                    <th>Username</th>
                    <th>Alamat</th>
                    <th>Foto</th>
                    <th>Settings</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    $nomor=1;
                    $sql = $koneksi->query("SELECT *FROM supplier") or die(mysqli_error());?>
                <?php while ($data = $sql->fetch_assoc()) {?>
                <tr class="gradeX" align="center">
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $data['nama_supplier']; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td><img width="100px" src="../assets/img/identitas/<?php echo $data['foto_supplier'] ?>"></td>
                    <td>
                        <a href="index_manager.php?halaman=supplier&aksi=edit&id=<?php echo $data['id_supplier']; ?>" class="btn btn-theme"><i class="fa fa-cog"></i></a>
                        <a href="index_manager.php?halaman=supplier&aksi=delete&id=<?php echo $data['id_supplier']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
