<section id="main-content">
      <section class="wrapper">
        <h3>Edit Data Anggota</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Data Anggota</h4>
              <?php 
              $id = @$_GET['id'];
              $sql = mysqli_query($koneksi,"SELECT *FROM anggota where id_anggota = '$_GET[id]'") or die(mysqli_error());
              $data = mysqli_fetch_array($sql);
              ?>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda" required value="<?php echo $data['nama_anggota']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" placeholder="Masukan Username Anda" required value="<?php echo $data['username']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" placeholder="Masukan Password Anda" required value="<?php echo $data['password']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-10">
                    <button type="submit" class="btn btn-round btn-primary" name="simpan">Save</button>
                  </div>
                </div>
              </form>
              <?php
              if (isset($_POST["simpan"])) {
                
                $nama = $_POST['nama'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $level = 'admin';

                $koneksi->query("UPDATE anggota set nama_anggota='$_POST[nama]',username='$_POST[username]',password='$_POST[password]' where id_anggota='$_GET[id]'") or die (mysqli_error($koneksi));
              ?>
              <script type="text/javascript">
                alert("Sukses. Data Berhasil Di Simpan");
                window.location.href='index_manager.php?halaman=anggota';
              </script>
            <?php }; ?>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
      </section>
    </section>