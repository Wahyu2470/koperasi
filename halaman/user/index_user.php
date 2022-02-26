    <section id="main-content">
      <section class="wrapper">
        <h3> Data User</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <div class="float-right">
                <a href="index.php?halaman=user&aksi=tambah" class="btn btn-theme">
                  <i class="fa fa-edit">  Tambah Data </i></a>
              </div>    
                <table class="table table-bordered table-striped table-condensed" id="example1">
                <br> 
                <thead align="center">
                	<tr align="center">
                	<th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Settings</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                	$nomor=1;
					$sql = $koneksi->query("SELECT *FROM user") or die(mysqli_error());?>
				<?php while ($data = $sql->fetch_assoc()) {?>
				<tr class="gradeX" align="center">
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $data['nama_user']; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['level_user']; ?></td>
                    <td>
                    	<a href="index.php?halaman=user&aksi=edit&id=<?php echo $data['id_user']; ?>" class="btn btn-theme"><i class="fa fa-cog"></i></a>
                    	<a href="index.php?halaman=user&aksi=delete&id=<?php echo $data['id_user']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
