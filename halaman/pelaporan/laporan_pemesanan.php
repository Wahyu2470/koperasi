    <section id="main-content">
      <section class="wrapper">
        <div class="col-lg-12 row box box-danger" style="padding: 20px;margin: 20px;">
    <div class="col-lg-4"></div>
    <div class="col-lg-4 col-xs-12">
      <form method="POST" action="" class="form-inline">
       <label for="date1">Tampilkan transaksi bulan </label>
       <select class="form-control mr-2" name="bulan">
        <option value="">-</option>
        <option value="1">Januari</option>
        <option value="2">Februari</option>
        <option value="3">Maret</option>
        <option value="4">April</option>
        <option value="5">Mei</option>
        <option value="6">Juni</option>
        <option value="7">Juli</option>
        <option value="8">Agustus</option>
        <option value="9">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
       </select>
       <button type="submit" name="submit" class="btn btn-primary">Tampilkan</button>
      </form>
      <?php 
        if (isset($_POST['submit'])) {
            $bln = date($_POST['bulan']);

            if (!empty($bln)) {
                $sql = mysqli_query($koneksi,"SELECT * FROM pembelian_barang WHERE MONTH(tanggal_pembelian) = '$bln'");
            } else {
                $sql = mysqli_query($koneksi,"SELECT * FROM pembelian_barang");
            } else {
                $sql = mysqli_query($koneksi,"SELECT * FROM pembelian barang");
            }
            $query=$sql->mysqli_num_rows();
        }
      ?>
    </div>
    <div class="col-lg-4"></div>
</div>

</section>
</section>
