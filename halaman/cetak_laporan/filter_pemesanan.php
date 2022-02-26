<section id="main-content">
      <section class="wrapper">
        <h3> Cetak Laporan</h3>
        <div class="row mt">
          <div class="col-lg-12">
              <div class="col-lg-12 row box box-danger" style="padding: 20px;margin: 20px;">
                <div class="content-panel">
             <form method="POST">
              <input type="hidden" name="halaman" value="<?php echo $_GET['halaman']?>">
              <div class="form-group" align="center">
              <h4>Cetak Laporan Pemesanan Anggota</h4>
              <br>
              <br>
              <br>
               <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Dari</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control input-lg" id="exampleInputEmail1" value="<?php echo date('Y-m-d') ?>" name="date1" required>
                  </div>
                </div>
                <br>
              <br>
              <br>

              <br>
              <br>
              <br>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Sampai</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control input-lg" id="exampleInputEmail1" value="<?php echo date('Y-m-d') ?>" name="date2" required>
                  </div>
                </div>
              </div>
              <br>
              <br>
              <br>
              <br>
              <div class="form-group">
                  <a href="halaman/cetak_laporan/cetak_filter_pemesanan.php?date1=<?php echo date('Y-m-d') ?>& date2=<?php echo date('Y-m-d') ?>" class="btn btn-danger btn-block">Filter</a>
              </div>
            </form>
          </div>
        </div>
        <div class="row mt">
          <div class="col-lg-12">
        </div>
    </div>
</section>
</section>
