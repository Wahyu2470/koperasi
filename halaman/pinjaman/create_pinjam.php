<section id="main-content">
      <section class="wrapper">
        <h3>Tambah Data Pinjaman Anggota</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Tambah Data Pinjaman Anggota</h4>
              <form class="form-horizontal style-form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nama Anggota</label>
                    <div class="col-sm-10">
                    <select class="form-control custom-select input-lg" name="anggota">
                      <option disabled selected>-- Pilih Nama Anggota --</option>
                      <?php 
                        $query = mysqli_query($koneksi, "SELECT * FROM anggota");
                        while($data = $query->fetch_assoc()){ 
                      ?> 
                      <option value="<?php echo $data["id_anggota"]?>"><?php echo $data['nama_anggota'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Angsuran</label>
                  <div class="col-sm-10">
                    <select class="form-control custom-select input-lg" name="cicilan" onchange="changeValue(this.value)">
                      <option disabled selected>-- Pilih Angsuran --</option>
                        <?php 
                          $sql=mysqli_query($koneksi,"SELECT *FROM Cicilan") or die(mysqli_error());
                          $jsArray = "var prdCicilan = new Array();\n";
                          while ($data=mysqli_fetch_array($sql)) {
                          echo '<option value="'.$data['id_cicilan'].'">'.$data['bulan'].'</option> ';
                          $jsArray .= "prdCicilan['" . $data['id_cicilan'] . "'] = {bulan:'" . addslashes($data['bulan']) . "',bunga:'" . addslashes($data['bunga']) . "'};\n";
                        }
                      ?>
                    </select>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Bulan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control input-lg" name="bulan" id="bulan" required readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Bunga %</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control input-lg" name="bunga" id="bunga" required readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Jumlah Pinjaman</label>
                  <div class="col-sm-10">
                    <input type="number" name="dana" class="form-control input-lg" placeholder="Masukan Jumlah Pinjaman Rp.">
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
                $cicilan  = $_POST['cicilan'];
                $bunga    = $_POST['bunga'];
                $dana     = $_POST['dana'];
                $tanggal  = $_POST['tanggal'];
                $angsuran = $_POST['angsuran'];
                
                $query_anggota = $koneksi->query("SELECT *FROM anggota WHERE id_anggota='$anggota'");
                $data_anggota  = $query_anggota->fetch_assoc();
                $nama_anggota  = $data_anggota['nama_anggota'];

                $query_cicilan = $koneksi->query("SELECT *FROM cicilan WHERE id_cicilan='$cicilan'");
                $data_cicilan  = $query_cicilan->fetch_assoc();
                $bunga_cicilan  = $data_cicilan['bunga'];
                $bulan_cicilan = $data_cicilan['bulan'];

                $bunga_bulan = ($bunga_cicilan/12)/100;
                $bagi = 1-(1/pow(1+$bunga_bulan,$bulan_cicilan));
                $angsuran = $dana/($bagi/$bunga_bulan);

                $jumlah_pinjam = $angsuran*$bulan_cicilan;
              
                $koneksi->query("INSERT INTO pinjaman_anggota(tgl, id_anggota,jumlah,id_cicilan,lama,bunga) values('$tanggal','$anggota','$dana','$cicilan','$bulan_cicilan','$bunga')") or die (mysqli_error());

                $id_pinjam = $koneksi->insert_id;
                $koneksi->query("INSERT INTO pinjaman_detail(id_pinjam,id_cicilan,angsuran,bunga,tgl_bayar,jumlah_bayar) values('$id_pinjam','$cicilan','$angsuran','$bunga','$tanggal','$jumlah_pinjam')") or die (mysqli_error());


              ?>
              <script type="text/javascript">
                alert("Sukses. Data Berhasil Di Simpan");
                window.location.href='index.php?halaman=pinjaman';
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
          <script type="text/javascript">    
            <?php echo $jsArray; ?>  
            function changeValue(x){  
            document.getElementById('bunga').value = prdCicilan[x].bunga;
            document.getElementById('bulan').value = prdCicilan[x].bulan;   
            };  
          </script>
      </section>
    </section>