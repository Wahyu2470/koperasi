<section id="main-content">
      <section class="wrapper">
        <div class="row mt">
          <div class="col-lg-9 main-chart">
              <div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h5>Barang</h5>
                  </div>
                  <?php
                  $idsup = $_SESSION['supplier']['id_supplier'];
                    $sql = $koneksi->query("SELECT *FROM barang_detail WHERE id_supplier=$idsup") or die(mysqli_error());
                        // menghitung data barang
                        $jumlah_barang = mysqli_num_rows($sql);
                        ?>
                  <h1 class="mt"><i class="fa fa-archive fa-3x"></i></h1>
                  <p>Total Barang</p>
                  <footer>
                    <div class="centered">
                      <h5><i class="fa fa-archive"></i> <?php echo $jumlah_barang ;?> Barang </h5>
                    </div>
                  </footer>
                </div>
              </div>
                <!--  /darkblue panel -->
              </div>
            </div>
      </section>
    </section>