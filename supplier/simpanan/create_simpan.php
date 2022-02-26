<section id="main-content">
      <section class="wrapper">
        <h3>Tambah Data Simpanan Anggota</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Tambah Data Simpanan Anggota</h4>
              <form class="form-horizontal style-form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Anggota</label>
                  <div class="col-sm-10">
                    <select class="form-control custom-select input-lg" name="anggota" onchange="changeValue(this.value)">
                      <option disabled selected>-- Pilih Nama Anggota --</option>
                        <?php 
                          $sql=mysqli_query($koneksi,"SELECT *FROM anggota") or die(mysqli_error());
                          $jsArray = "var prdAnggota = new Array();\n";
                          while ($data=mysqli_fetch_array($sql)) {
                          echo '<option value="'.$data['id_anggota'].'">'.$data['nama_anggota'].'</option> ';
                          $jsArray .= "prdAnggota['" . $data['id_anggota'] . "'] = {ktp:'" . addslashes($data['no_ktp']) . "',tlp:'" . addslashes($data['no_tlp']) . "'};\n";
                        }
                      ?>
                    </select>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nomor KTP</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control input-lg" name="ktp" id="ktp" required readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nomor Telepon</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control input-lg" name="tlp" id="tlp" required readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Jumlah Simpanan</label>
                  <div class="col-sm-10">
                    <input type="number" name="dana" class="form-control input-lg" placeholder="Masukan Jumlah Simpanan Rp.">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control input-lg" id="exampleInputEmail1" name="tanggal" required>
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
                
                $anggota  = $_POST['anggota'];
                $ktp      = $_POST['ktp'];
                $tlp      = $_POST['tlp'];
                $dana     = $_POST['dana'];
                $tanggal  = $_POST['tanggal'];
                
                $query_anggota = $koneksi->query("SELECT *FROM anggota WHERE id_anggota='$anggota'");
                $data_anggota  = $query_anggota->fetch_assoc();
                $nama_anggota  = $data_anggota['nama_anggota'];
              
                $koneksi->query("INSERT INTO simpan(id_anggota, nama_anggota,no_ktp,no_tlp,jumlah_simpan,tanggal_simpan) values('$anggota','$nama_anggota','$ktp','$tlp','$dana','$tanggal')") or die (mysqli_error());

              ?>
              <script type="text/javascript">
                alert("Sukses. Data Berhasil Di Simpan");
                window.location.href='index.php?halaman=simpanan';
              </script>
            <?php }; ?>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
          <script type="text/javascript">    
            <?php echo $jsArray; ?>  
            function changeValue(x){  
            document.getElementById('ktp').value = prdAnggota[x].ktp;
            document.getElementById('tlp').value = prdAnggota[x].tlp;   
            };  
          </script>
      </section>
    </section>