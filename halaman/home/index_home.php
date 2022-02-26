<section id="main-content">
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Dashboard</h3>
        <div class="row mt">
          <div class="col-lg-12">
                <!--  /darkblue panel -->
                <div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h5>Anggota Koperasi</h5>
                  </div>
                  <?php
                    $sql1 = $koneksi->query("SELECT *FROM anggota") or die(mysqli_error());
                        // menghitung data barang
                        $jumlah_anggota = mysqli_num_rows($sql1);
                        ?>
                  <h1 class="mt"><i class="fa fa-user fa-3x"></i></h1>
                  <p>Total Anggota Koperasi</p>
                  <footer>
                    <div class="centered">
                      <h5><i class="fa fa-user"></i> <?php echo $jumlah_anggota ;?> Anggota Koperasi </h5>
                    </div>
                  </footer>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h5>Supplier</h5>
                  </div>
                  <?php
                    $sql = $koneksi->query("SELECT *FROM supplier") or die(mysqli_error());
                        // menghitung data barang
                        $jumlah_user = mysqli_num_rows($sql);
                        ?>
                  <h1 class="mt"><i class="fa fa-user fa-3x"></i></h1>
                  <p>Total Supplier</p>
                  <footer>
                    <div class="centered">
                      <h5><i class="fa fa-user"></i> <?php echo $jumlah_user ;?> Supplier </h5>
                    </div>
                  </footer>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h5>Manager</h5>
                  </div>
                  <?php
                    $sql = $koneksi->query("SELECT *FROM manager") or die(mysqli_error());
                        // menghitung data barang
                        $jumlah_manager = mysqli_num_rows($sql);
                        ?>
                  <h1 class="mt"><i class="fa fa-user fa-3x"></i></h1>
                  <p>Total Manager</p>
                  <footer>
                    <div class="centered">
                      <h5><i class="fa fa-user"></i> <?php echo $jumlah_manager ;?> Manager </h5>
                    </div>
                  </footer>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h5>Barang</h5>
                  </div>
                  <?php
                    $sql = $koneksi->query("SELECT *FROM barang_dagang") or die(mysqli_error());
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
              <div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h5>Simpanan</h5>
                  </div>
                  <?php
                    
                    $sql = $koneksi->query("SELECT SUM(jumlah_simpan) FROM simpanan;") or die(mysqli_error());
                        
                        $data = $sql->fetch_array();
                        $jumlah_simpan = mysqli_num_rows($sql);
                        $jumlah = $data['SUM(jumlah_simpan)'];
                        
                        ?>
                  <h1 class="mt"><i class="fa fa-money fa-3x"></i></h1>
                  <p>Total Simpanan</p>
                  <footer>
                    <div class="centered">
                      <h5><i class="fa fa-money"></i> Rp. <?php echo number_format($jumlah) ;?> .00 </h5>
                    </div>
                  </footer>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h5>Pinjaman</h5>
                  </div>
                  <?php
                    $sql = $koneksi->query("SELECT SUM(jumlah_bayar) FROM pinjaman_detail") or die(mysqli_error());
                        // menghitung data barang
                        $data = $sql->fetch_assoc();
                        $jumlah_pinjam = mysqli_num_rows($sql);
                        $jumlah1 = $data['SUM(jumlah_bayar)'];
                        ?>
                  <h1 class="mt"><i class="fa fa-money fa-3x"></i></h1>
                  <p>Total Simpanan</p>
                  <footer>
                    <div class="centered">
                      <h5><i class="fa fa-money"></i> Rp. <?php echo number_format($jumlah1) ;?> .00 </h5>
                    </div>
                  </footer>
                </div>
              </div>
              </div>
            </div>
      </section>
    </section>