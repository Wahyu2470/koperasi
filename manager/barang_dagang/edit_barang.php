<section id="main-content">
      <section class="wrapper">
        <h3>Edit Data Barang</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <?php 
              $id = @$_GET['id'];
              $sql = mysqli_query($koneksi,"SELECT *FROM barang_detail 
                JOIN jenis_barang ON barang_detail.id_jenis=jenis_barang.id_jenis 
                JOIN barang_dagang ON barang_detail.id_barang=barang_dagang.id_barang
                JOIN supplier ON barang_detail.id_supplier=supplier.id_supplier
                WHERE barang_detail.id_detail_barang = '$_GET[id]'") or die(mysqli_error($koneksi));
              $data = mysqli_fetch_array($sql);
              ?>
              <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Data Barang</h4>
              <form class="form-horizontal style-form" method="post" enctype="multipart/form-data">
                 <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Supplier</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda" required value="<?php echo $data['nama_supplier'];?>" readonly>
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
                    <input type="number" name="brg_kg" class="form-control" placeholder="Total Barang Masuk KG" value="<?php echo $data['jumlah_detail']; ?>">
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

                $sqli = mysqli_query($koneksi,"SELECT *FROM barang_dagang 
                JOIN jenis_barang ON barang_dagang.id_jenis=jenis_barang.id_jenis 
                JOIN barang_detail ON barang_dagang.id_barang=barang_detail.id_barang 
                WHERE barang_detail.id_detail_barang = '$_GET[id]'") or die(mysqli_error($koneksi));
                $datai = mysqli_fetch_array($sqli);
                $id_barang1 = $datai['id_barang'];
                $stok = $datai['jumlah_kilo'];
                $sisa    =$stok+$brg_kg;

                $koneksi->query("UPDATE barang_dagang set jumlah_kilo='$sisa' where id_barang='$id_barang1'") or die (mysqli_error($koneksi));

                $koneksi->query("UPDATE barang_detail set jumlah_detail='$_POST[brg_kg]',tanggal_masuk='$_POST[tanggal]' where id_detail_barang='$_GET[id]'") or die (mysqli_error($koneksi));

              ?>
              <script type="text/javascript">
                alert("Sukses. Data Berhasil Di Simpan");
                window.location.href='index_manager.php?halaman=barang';
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