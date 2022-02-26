<section id="main-content">
      <section class="wrapper">
        <h3>Edit Data Barang</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <?php 
              $id = @$_GET['id'];
              $sql = mysqli_query($koneksi,"SELECT *FROM barang_dagang 
                JOIN supplier ON barang_dagang.id_supplier=supplier.id_supplier 
                JOIN jenis_barang ON barang_dagang.id_jenis=jenis_barang.id_jenis 
                JOIN barang_detail ON barang_dagang.id_barang=barang_detail.id_barang 
                WHERE barang_dagang.id_barang = '$_GET[id]'") or die(mysqli_error());
              $data = mysqli_fetch_array($sql);
              ?>
              <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Data Barang</h4>
              <form class="form-horizontal style-form" method="post" enctype="multipart/form-data">
                 <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Supplier</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda" required value="<?php echo $data['nama_supplier']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Alamat Asal Barang</label>
                  <div class="col-sm-10">
                    <input type="text" name="alamat" id="alamat" class="form-control" readonly required value="<?php echo $data['alamat']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Jenis Barang</label>
                  <div class="col-sm-10">
                  <select class="form-control custom-select input-lg" name="jenis_barang" readonly>
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
                  <label class="col-sm-2 col-sm-2 control-label">Nama Barang</label>
                  <div class="col-sm-10">
                    <input type="text" name="nm_brg" class="form-control" placeholder="Masukan Nama Barang" value="<?php echo $data['nama_barang']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Harga Perkilo</label>
                  <div class="col-sm-10">
                    <input type="number" name="hrg_kg" class="form-control" placeholder="Masukan Harga" value="<?php echo $data['harga_kilo']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Total Barang Masuk Perkilo</label>
                  <div class="col-sm-10">
                    <input type="number" name="brg_kg" class="form-control" placeholder="Total Barang Masuk KG" value="<?php echo $data['jumlah_kilo']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Barang Masuk</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control input-lg" id="exampleInputEmail1" name="tanggal" required value="<?php echo $data['tanggal_masuk']; ?>">
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

                $koneksi->query("UPDATE barang_dagang set jumlah_kilo='$_POST[brg_kg]' where id_barang='$_GET[id]'") or die (mysqli_error($koneksi));

                $koneksi->query("UPDATE barang_detail set jumlah_detail='$_POST[brg_kg]',tanggal_masuk='$_POST[tanggal]' where id_barang='$_GET[id]'") or die (mysqli_error($koneksi));

              ?>
              <script type="text/javascript">
                alert("Sukses. Data Berhasil Di Simpan");
                window.location.href='index.php?halaman=barang';
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