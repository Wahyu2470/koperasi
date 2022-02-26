<section id="main-content">
      <section class="wrapper">
        <h3>Edit Data Supplier</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Data Supplier</h4>
              <?php 
              $id = @$_GET['id'];
              $sql = mysqli_query($koneksi,"SELECT *FROM supplier where id_supplier = '$_GET[id]'") or die(mysqli_error());
              $data = mysqli_fetch_array($sql);
              ?>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda" required value="<?php echo $data['nama_supplier']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat Anda" required value="<?php echo $data['alamat']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nomor Telepon</label>
                  <div class="col-sm-10">
                    <input type="text" name="no_tlp" class="form-control" placeholder="Masukan Nomor Telepon Anda" required value="<?php echo $data['no_tlp']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nomor KTP</label>
                  <div class="col-sm-10">
                    <input type="password" name="no_ktp" class="form-control" placeholder="Masukan No KTP Anda" required value="<?php echo $data['no_ktp']; ?>">
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
                $alamat = $_POST['alamat'];
                $no_tlp = $_POST['no_tlp'];
                $no_ktp = $_POST['no_ktp'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                

                $koneksi->query("UPDATE supplier set nama_supplier='$_POST[nama]',username='$_POST[username]',password='$_POST[password]',alamat='$_POST[alamat]',no_tlp='$_POST[no_tlp]',no_ktp='$_POST' where id_supplier='$_GET[id]'") or die (mysqli_error($koneksi));
              ?>
              <script type="text/javascript">
                alert("Sukses. Data Berhasil Di Simpan");
                window.location.href='index_manager.php?halaman=supplier';
              </script>
            <?php }; ?>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
      </section>
    </section>