<?php 
include 'halaman/metode/k-means.php';
$proses = new Kmeans\Proses;

$query = $koneksi->query("SELECT * FROM pembelian_barang JOIN pembelian 
  ON pembelian_barang.id_pembelian=pembelian.id_pembelian JOIN barang_dagang
  ON pembelian_barang.id_barang=barang_dagang.id_barang WHERE pembelian_barang.id_barang=barang_dagang.id_barang GROUP BY barang_dagang.id_barang");
    
    // Check connection
    $data=[];
    $barang=[];
    while($row=$query->fetch_assoc()){
        $data[]=$row;
        $barang[]=$row['nama_barang'];
    }
?>
<section id="main-content">
	<section class="wrapper">
  <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <div class="float-right">
              <section id="unseen">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Metode K-Means</h4>
              </div>    
                <table class="table table-bordered table-striped table-condensed">
                <br> 
                <h5 class="mb"> Centroid Random</h5>
                <thead align="center">
                    <tr align="center">
                    <th rowspan="1">No</th>
                    <th rowspan="1">Centroid</th>
                    <th rowspan="1"><?php echo $variable_x; ?></th>
                    <th rowspan="1"><?php echo $variable_y; ?></th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $no= 1;
                foreach ($centroid[0] as $key_c => $value_c) { ?>
                <tr class="gradeX" align="center">
                    <td><?php echo $no; ?></td>
                    <td><?php echo ($key_c+1); ?></td>
										<td><?php echo $value_c[0]; ?></td>
										<td><?php echo $value_c[1]; ?></td>
                </tr>
                <?php 
              $no++;
              } ?>
                </tbody>
            </table>
            <?php foreach ($hasil_iterasi as $key => $value) { ?>
            <table class="table table-bordered table-striped table-condensed">
                <br> 
                <h5 class="mb"> Iterasi ke <?php echo ($key+1) ?></h5>
                <thead align="center">
                    <tr align="center">
                    <th rowspan="1">No</th>
                    <th rowspan="1">Centroid</th>
                    <th rowspan="1"><?php echo $variable_x; ?></th>
                    <th rowspan="1"><?php echo $variable_y; ?></th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $no= 1;
                foreach ($centroid[$key] as $key_c => $value_c) { ?>
                <tr class="gradeX" align="center">
                    <td><?php echo $no; ?></td>
                    <td><?php echo ($key_c+1); ?></td>
										<td><?php echo $value_c[0]; ?></td>
										<td><?php echo $value_c[1]; ?></td>
                    
                </tr>
                <?php 
              $no++;
              } ?>
                </tbody>
            </table>
            <table class="table table-bordered table-striped table-condensed">
                <br> 
                <h5 class="mb"> Iterasi ke <?php echo ($key+1) ?></h5>
                <thead align="center">
                    <tr align="center">
                    <th rowspan="2">Data Ke-i</th>
                    <th rowspan="2" class="text-center">Nama Barang</th>
                    <th rowspan="2"><?php echo $variable_x; ?></th>
                    <th rowspan="2"><?php echo $variable_y; ?></th>
                    <th rowspan="1" class="text-center" colspan="<?php echo $cluster; ?>">Jarak ke centroid</th>
										<th rowspan="2" class="text-center" >Jarak terdekat</th>
										<th rowspan="2" class="text-center">Cluster</th>
                  </tr>
                  <?php for ($i=1; $i <=$cluster ; $i++) { ?> 
										<th rowspan="1" class="text-center"><?php echo $i; ?></th>
									<?php }?>
                </thead>
                <tbody>
                <?php 
                $no= 1;
                foreach ($value as $key_data => $value_data) { ?>
                <tr class="gradeX" align="center">
                    <td><?php echo $key_data+1; ?></td>
                    <td><?php echo $barang[$key_data]; ?></td>
										<td><?php echo $value_data['data'][0]; ?></td>
										<td><?php echo $value_data['data'][1]; ?></td>
                    <?php
										foreach ($value_data['jarak_ke_centroid'] as $key_jc => $value_jc) { ?>
											<td class="text-center"><?php echo $value_jc; ?></td>
										<?php 
										}
										?>
										<td class="text-center"><?php echo $value_data['jarak_terdekat']['value']; ?></td>
										<td class="text-center"><?php echo $value_data['jarak_terdekat']['cluster']; ?></td>
                </tr>
                <?php 
              } ?>
                </tbody>
            </table>
            <?php	}?>
            </section>
          
         
        </div>
       
    </div>
</div>
</section>
</section>