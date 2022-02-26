<section id="main-content">
      <section class="wrapper">
        <h3>Edit Data Barang</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <?php 
              $id = @$_GET['id'];
              $sql = mysqli_query($koneksi,"SELECT *FROM barang_dagang JOIN supplier ON barang_dagang.id_supplier=supplier.id_supplier JOIN jenis_barang ON barang_dagang.id_jenis=jenis_barang.id_jenis where barang_dagang.id_barang = '$_GET[id]'") or die(mysqli_error());
              $data = mysqli_fetch_array($sql);
              ?>
              <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Data Barang</h4>
              <form class="form-horizontal style-form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Barang</label>
                  <div class="col-sm-10">
                    <input type="text" name="nm_brg" class="form-control" placeholder="Masukan Nama Barang" value="<?php echo $data['nama_barang']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Jenis Barang</label>
                  <div class="col-sm-10">
                  <select class="form-control custom-select input-lg" name="jenis_barang">
                     <option value="<?php echo $data['id_jenis']; ?>"><?php echo $data['nama_jenis_barang']; ?></option>
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
                  <label class="col-sm-2 col-sm-2 control-label">Harga Perkilo</label>
                  <div class="col-sm-10">
                    <input type="number" name="hrg_kg" class="form-control" placeholder="Masukan Harga" value="<?php echo $data['harga_kilo']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Foto Barang</label>
                  <div class="col-sm-10">
                    <input type="file"required name="ft_barang" class="default" accept="image" value="<?php echo $data['gambar_barang']; ?>"/>
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
                
                $jenis_barang = $_POST['jenis_barang'];
                $nm_brg   = $_POST['nm_brg'];
                $hrg_kg    = $_POST['hrg_kg'];
                $brg_kg   = $_POST['brg_kg'];
                $tanggal  = $_POST['tanggal'];


                $fotobarang = $_FILES["ft_barang"]["name"];
                $barangdagang = $_FILES["ft_barang"]["tmp_name"];
                move_uploaded_file($barangdagang, "assets/img/barang/$fotobarang");

                $koneksi->query("UPDATE barang_dagang set id_jenis='$_POST[jenis_barang]',nama_barang='$_POST[nm_brg]',harga_kilo='$_POST[hrg_kg]',gambar_barang='$fotobarang' where id_barang='$_GET[id]'") or die (mysqli_error($koneksi));
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
            document.getElementById('alamat').value = prdSupplier[x].alamat;   
            };  
          </script>
          <!-- col-lg-12-->
        </div>
      </section>
    </section>