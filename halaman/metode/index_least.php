<section id="main-content">
      <section class="wrapper">
      <?php
        require ('halaman/metode/least_square.php');
        $sql = mysqli_query($koneksi,"SELECT *FROM pembelian_barang JOIN pembelian 
        ON pembelian_barang.id_pembelian=pembelian.id_pembelian JOIN barang_dagang ON pembelian_barang.id_barang=barang_dagang.id_barang JOIN anggota ON pembelian_barang.id_anggota=anggota.id_anggota WHERE pembelian_barang.id_barang='1' 
        AND pembelian_barang.id_anggota='5'") or die(mysqli_error($koneksi));
        $data = mysqli_fetch_array($sql);
        $y[] = $data['jumlah_barang']!=0 ? $data['jumlah_barang'] : 0;
        $n=0;
        $x[]=-7;
        $total_x=0;
        $total_y=0;
        $total_xx = 0;
		    $total_xy = 0;
        $regresi = new RegresiLinier($x, $y);
        ?>
        <h3> Perhitungan Metode </h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Metode Least Square Regression Line</h4>
              <section id="unseen">
              <h4> Prediksi Kebutuhan Barang Dagang <?php echo $data['nama_barang'];?> Untuk <?php echo $data['nama_anggota'];?> </h4>    
                <table class="table table-bordered table-striped table-condensed">
                <br> 
                <thead align="center">
                    <tr align="center">
                    <th width="27">No</th>
                    <th width="150">Tanggal</th>
                    <th width="50">Total Pembelian (<?php echo $data['nama_barang'];?>)</th>
                    <th width="50">Xi</th>
                    <th width="50">XX</th>
                    <th width="50">XY</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $hasilregresi = 0;
                $n= 0;
                $no= 1;
                $sum_x = -24;
                $total_x=0;
                $total_y=0; 
                $total_xx = 0;
		            $total_xy = 0;
                $sql = mysqli_query($koneksi,"SELECT *FROM pembelian_barang JOIN pembelian 
                ON pembelian_barang.id_pembelian=pembelian.id_pembelian WHERE pembelian_barang.id_barang='1' 
                AND pembelian_barang.id_anggota='5' ORDER BY pembelian.tanggal_pembelian") or die(mysqli_error());
                while($data = mysqli_fetch_array($sql)){
                  $n = count($data);
                  $mid = ( ($n - 1) / 2) +1; 
                   $jumlah=$data['jumlah_barang'];
                   $count    =mysqli_num_rows($sql);

                   for( $i =0 , $x = ( $mid - 1 ) * -1; $x <= ( $mid - 1 ), $i < $n; $x++, $i++ )
                  {
                   $sum_x += $x;
                   $xx    = ($sum_x * $sum_x);
                   $xy    = ($sum_x * $jumlah);
                  } 
                   $total_x   = $total_x + $sum_x;
                   $total_y   = $total_y + $jumlah;
                   $total_xx  = $total_xx + $xx;
                   $total_xy  = $total_xy + $xy;
                    ?>

                <tr class="gradeX" align="center">
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['tanggal_pembelian']; ?></td>
                    <td><?php echo $data['jumlah_barang'];?></td>
                    <td><?=$sum_x;?></td>
                    <td><?=$xx;?></td>
                    <td><?=$xy;?></td>
                    <!-- <td><?=$Y;?></td> -->
                </tr>
                <?php 
            $no++;
            $sum_x++;
            $n++;
        };
            ?>
            <tr align="center">
                  <td colspan="1">Jumlah</td>
                  <td><?=$count?></td>
                  <td><?=$total_y?></td>
			            <td><?=$total_x?></td>
			            <td><?=$total_xx?></td>
			            <td><?=$total_xy?></td>
            </tr>
                </tbody>
                
            </table>

            <?php 
          function ab(){
            //mendapat nilai konstanta A dan B
            $a = ((array_sum($this->y)) / (($this->n)));
            $this->a = $a;
            
            $b = ((array_sum($this->xy)) / (array_sum($this->x2)));
            $this->b = $b;
        }
        function hasila($total_y,$count){
          $yi = $total_y;
          $ni = $count;
          $a = $yi/$ni;
          return $a;
        }
        function hasilb($total_xy,$total_xx){
          $xyi = $total_xy;
          $xxi = $total_xx;
          $b = $xyi/$xxi;
          return $b;
        }
        $a=hasila($total_y,$count);
        $b=hasilb($total_xy,$total_xx);
        echo "Rumus Least Square Regression Line<br>";
        echo "Y = $a + $b * x"
         ?>
         <form class="form-horizontal style-form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Pertihungan Least Square Regression Line</label>
                  <div class="col-sm-10">
                    <input type="number" name="hitungx" class="form-control" placeholder="Masukan Pehitungan X">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-10">
                    <button type="submit" class="btn btn-round btn-primary" name="prediksi" id="predisi" value="Prediksi">Hitung</button>
                  </div>
                </div>
                </form>
                <?php
                
                if (isset($_POST["prediksi"])){
                  $hitungx = $_POST['hitungx'];
                  $x2 = $x + $hitungx;
                  $y2 = $a + $b * $x2;
                  echo "Predikisi penjualan untuk xi $hitungx berikutnya adalah $y2 ";
                }?>
            </section>
            <table class="table table-bordered table-striped table-condensed">
                <br> 
                <thead align="center">
                    <tr align="center">
                    <th width="27">No</th>
                    <th width="150">Tanggal</th>
                    <th width="50">Total Pembelian (Y)</th>
                    <th width="50">Xi</th>
                    <th width="50">XX</th>
                    <th width="50">XY</th>
                    <th width="50">Y Prediksi</th>
                    <th width="50">Error</th> 
                    <th width="50">Error^2</th>
                    <th width="50">MAPE</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $hasilregresi = 0;
                $n= 0;
                $no= 1;
                $x = -24;
                $total_x=0;
                $total_y=0; 
                $total_xx = 0;
                $Y_total = 0;
                $err1_total = 0;
                $err2_total = 0;
                $total_mape = 0;
                $sql = mysqli_query($koneksi,"SELECT *FROM pembelian_barang JOIN pembelian 
                ON pembelian_barang.id_pembelian=pembelian.id_pembelian WHERE pembelian_barang.id_barang='1' 
                AND pembelian_barang.id_anggota='5'") or die(mysqli_error());
                while($data = mysqli_fetch_array($sql)){
                   $jumlah=$data['jumlah_barang'];
                   $count    =mysqli_num_rows($sql); 
                   $xx    = $x * $x;
                   $xy    = $x * $jumlah;
                   $total_x   = $total_x + $x;
                   $total_y   = $total_y + $jumlah;
                   $total_xx  = $total_xx + $xx;
                   $total_xy  = $total_xy + $xy;
                   $Y = $a + $b * $x;
                   $error1 = $jumlah - $Y;
                   $er2 = pow($error1,2);
                   $mape = ($Y-$jumlah)/$jumlah*100;
                   $Y_total+=$Y;
                   $err1_total+=$error1;
                   $err2_total+=$er2;
                   $total_mape+=$mape;
                    ?>

                <tr class="gradeX" align="center">
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['tanggal_pembelian']; ?></td>
                    <td><?php echo $data['jumlah_barang'];?></td>
                    <td><?=$x;?></td>
                    <td><?=$xx;?></td>
                    <td><?=$xy;?></td>
                    <td><?=$Y;?></td>
                    <td><?=$error1;?></td>
                    <td><?=$er2;?></td>
                    <td><?=$mape;?></td>
                </tr>
                <?php 
            $no++;
            $x++;
            $n++;
        };
            ?>
            <tr align="center">
                  <td colspan="1">Jumlah</td>
                  <td><?=$count?></td>
                  <td><?=$total_y?></td>
                  <td><?=$total_x?></td>
                  <td><?=$total_xx?></td>
                  <td><?=$total_xy?></td>
                  <td><?=$Y_total?></td>
                  <td><?=$err1_total?></td>
                  <td><?=$err2_total?></td>
                  <td><?=$total_mape?></td>
            </tr>
                </tbody>
                
            </table>
             <?php
             $ni2 = $no-1; 
        function mape($total_mape,$ni2){
          $MAPE = $total_mape;
          
          $mape1 = $MAPE/$ni2;
          return $mape1;
        }
        function mse($err2_total,$ni2){
          $er22 = $err2_total;
          $mse2 = $er22/$ni2;
          return $mse2;
        }
        $mape1=mape($total_mape,$ni2);
        $mse2=mse($err2_total,$ni2);
        echo "Keterangan Perhitungan Hasil Error <br>";
        echo "- < 10% = Sangat Baik <br>";
        echo "- 10-20% = Baik <br>";
        echo "- 20-50% = Wajar <br>";
        echo "- >50% = Tidak Akurat <br>";
        echo "Hasil Akurasi Pada Least Square Regression Line <br>";
        echo "MSE = $err2_total / $ni2 = $mse2<br>";
        echo "MAPE = $mape1%";
         ?>
 
         
        </div>
       
    </div>
</div>

</section>
</section>

