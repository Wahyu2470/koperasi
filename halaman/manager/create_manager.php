<section id="main-content">
      <section class="wrapper">
        <h3>Tambah Data Manager</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Tambah Data Manager</h4>
              <form class="form-horizontal style-form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Manager</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select class="form-control custom-select input-lg" name="jenis_kelamin">
                      <option selected disabled="">-- Masukan Gender --</option>
                      <option value="Pria">Pria</option>
                      <option value="Wanita">Wanita</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat Anda">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nomor Telepon</label>
                  <div class="col-sm-10">
                    <input type="number" name="notlp" class="form-control" placeholder="Masukan Nama Anda">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" placeholder="Masukan Username Anda">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" placeholder="Buat Password">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Foto Identitas</label>
                  <div class="col-md-4">
                    <input type="file"required name="identitas" class="default" accept="image" />
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
                
                $nama     = $_POST['nama'];
                $alamat   = $_POST['alamat'];
                $notlp    = $_POST['notlp'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $level    = 'manager';

                $fotoidentitas = $_FILES["identitas"]["name"];
                $identitasmurid = $_FILES["identitas"]["tmp_name"];
                move_uploaded_file($identitasmurid, "assets/img/identitas/$fotoidentitas");

                $koneksi->query("INSERT INTO manager(nama_manager,jenis_kelamin,alamat,username,password,no_tlp,foto_manager) values('$nama','$jenis_kelamin','$alamat','$username','$password','$notlp','$fotoidentitas')") or die (mysqli_error($koneksi));

              ?>
              <script type="text/javascript">
                alert("Sukses. Data Berhasil Di Simpan");
                window.location.href='index.php?halaman=manager';
              </script>
            <?php }; ?>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
      </section>
    </section>