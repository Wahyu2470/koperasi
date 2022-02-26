<section id="main-content">
      <section class="wrapper">
        <h3>Edit Data Iuran</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Data Iuran</h4>
              <?php 
              $id = @$_GET['id'];
              $sql = mysqli_query($koneksi,"SELECT *FROM iuran_detail JOIN anggota ON iuran_detail.id_anggota = anggota.id_anggota where id_iuran = '$_GET[id]'") or die(mysqli_error());
              $data = mysqli_fetch_array($sql);
              ?>
              <form class="form-horizontal style-form" method="post">
                <!-- <div class="form-group">
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
                </div> -->
                 <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda" readonly required value="<?php echo $data['nama_anggota']; ?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nomor KTP</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control input-lg" name="ktp" id="ktp" required readonly value="<?php echo $data['no_ktp']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nomor Telepon</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control input-lg" name="tlp" id="tlp" required readonly value="<?php echo $data['no_tlp']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Jumlah Iuran</label>
                  <div class="col-sm-10">
                    <input type="number" name="dana" class="form-control input-lg" placeholder="Masukan Jumlah Simpanan Rp." value="<?php echo $data['jumlah_iuran']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control input-lg" id="exampleInputEmail1" name="tanggal" required value="<?php echo $data['tanggal_iuran']; ?>">
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
                
                
                $jumlah_simpan = $_POST['dana'];
                $tanggal = $_POST['tanggal'];

                $koneksi->query("UPDATE iuran_detail set tanggal_iuran='$_POST[tanggal]',jumlah_iuran='$_POST[dana]' where id_iuran='$_GET[id]'") or die (mysqli_error($koneksi));
              ?>
              <script type="text/javascript">
                alert("Sukses. Data Berhasil Di Simpan");
                window.location.href='index.php?halaman=iuran';
              </script>
            <?php }; ?>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
      </section>
    </section>