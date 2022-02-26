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
                  <label class="col-sm-2 col-sm-2 control-label">Nama Supplier</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $_SESSION['supplier']['nama_supplier']?>" name="supplier" class="form-control" placeholder="Masukan Nama Supplier" readonly>
                  </div>
                </div>
               <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Barang</label>
                  <div class="col-sm-10">
                    <select class="form-control custom-select input-lg" name="nm_brg" onchange="changeValue(this.value)">
                    <option disabled selected>-- Pilih Nama barang --</option>
                    <?php 
                      $sql=mysqli_query($koneksi,"SELECT *FROM barang_dagang") or die(mysqli_error());
                      $jsArray = "var prdBarang = new Array();\n";
                        while ($data=mysqli_fetch_array($sql)) {
                        echo '<option value="'.$data['id_barang'].'">'.$data['nama_barang'].'</option> ';
                        $jsArray .= "prdBarang['" . $data['id_barang'] . "'] = {harga:'" . addslashes($data['harga_kilo']) . "'};\n";
      
                   }
                   ?>
                  </select>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Harga Perkilo</label>
                  <div class="col-sm-10">
                    <input type="number" name="hrg_kg" class="form-control" placeholder="Masukan Harga" name="harga" id="harga" required readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Total Barang Masuk Perkilo</label>
                  <div class="col-sm-10">
                    <input type="number" name="brg_kg" class="form-control" placeholder="Total Barang Masuk KG">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Barang Masuk</label>
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
                
                $supplier = $_SESSION['supplier']['id_supplier'];
                $nm_brg   = $_POST['nm_brg'];
                $hrg_kg    = $_POST['hrg_kg'];
                $brg_kg   = $_POST['brg_kg'];
                $tanggal  = $_POST['tanggal'];


                $query_barang = $koneksi->query("SELECT *FROM barang_dagang WHERE id_barang='$nm_brg'");
                $data_barang = $query_barang->fetch_assoc();
                $id_jenis = $data_barang['id_jenis'];
                $stok = $data_barang['jumlah_kilo'];
                $sisa    =$stok+$brg_kg;

                $koneksi->query("UPDATE barang_dagang set jumlah_kilo='$sisa' where id_barang='$nm_brg'") or die (mysqli_error($koneksi));

                

                $koneksi->query("INSERT INTO barang_detail(id_jenis,id_barang,id_supplier,jumlah_detail,tanggal_masuk) VALUES('$id_jenis','$nm_brg','$supplier','$brg_kg','$tanggal')") or die (mysqli_error($koneksi));
              ?>
              <script type="text/javascript">
                alert("Sukses. Data Berhasil Di Simpan");
                window.location.href='index_supplier.php?halaman=barang';
              </script>
            <?php }; ?>
            </div>
          </div>
          <!-- col-lg-12-->
          <script type="text/javascript">    
          <?php echo $jsArray; ?>  
            function changeValue(x){  
            document.getElementById('harga').value = prdBarang[x].harga;   
            };  
          </script>
        </div>
      </section>
    </section>