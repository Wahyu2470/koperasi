<section id="main-content">
      <section class="wrapper">
        <h3>Tambah Data Barang</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Tambah Data Barang</h4>
              <form class="form-horizontal style-form" method="post" enctype="multipart/form-data">
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Barang</label>
                  <div class="col-sm-10">
                    <input type="text" name="nm_brg" class="form-control" placeholder="Masukan Nama Barang" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Jenis Barang</label>
                  <div class="col-sm-10">
                  <select class="form-control custom-select input-lg" name="jenis_barang">
                    <option>-- Pilih Jenis Barang --</option>
                   
                    <?php $prd=mysqli_query($koneksi,"SELECT * from jenis_barang order by id_jenis desc");
                    while ($dataprd=mysqli_fetch_array($prd)){
                    ?>
                    <option value="<?php echo $dataprd['id_jenis']; ?>" title="<?php echo $dataprd['id_jenis'];?>"><?php echo $dataprd['nama_jenis_barang']?></option>
                  <?php } ?>
                  </select>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Satuan</label>
                  <div class="col-sm-10">
                    <select class="form-control custom-select input-lg" name="satuan">
                      <option selected disabled="">-- Masukan Satuan --</option>
                      <option value="Kg">Kg</option>
                      <option value="Gram">Gram</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Harga Perkilo</label>
                  <div class="col-sm-10">
                    <input type="number" name="hrg_kg" class="form-control" placeholder="Masukan Harga">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Foto Barang</label>
                  <div class="col-sm-10">
                    <input type="file"required name="ft_barang" class="default" accept="image" />
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
                
                $nm_brg   = $_POST['nm_brg'];
                $hrg_kg    = $_POST['hrg_kg'];
                $jenis_barang = $_POST['jenis_barang'];
                $satuan = $_POST['satuan'];

                $fotobarang = $_FILES["ft_barang"]["name"];
                $barangdagang = $_FILES["ft_barang"]["tmp_name"];
                move_uploaded_file($barangdagang, "assets/img/barang/$fotobarang");


                $koneksi->query("INSERT INTO barang_dagang(nama_barang,id_jenis,harga_kilo,satuan_barang,gambar_barang) VALUES('$nm_brg','$jenis_barang','$hrg_kg','$satuan','$fotobarang')") or die (mysqli_error($koneksi));

              ?>
              <script type="text/javascript">
                alert("Sukses. Data Berhasil Di Simpan");
                window.location.href='index.php?halaman=barang_dagang';
              </script>
            <?php }; ?>
            </div>
          </div>
          <script type="text/javascript">    
          <?php echo $jsArray; ?>  
            function changeValue(x){  
            document.getElementById('harga').value = prdBarang[x].harga;   
            };  
          </script>
          <!-- col-lg-12-->
        </div>
      </section>
    </section>