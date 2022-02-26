<?php
if (isset($_GET['date1'])&& isset($_GET['date2'])) {
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
	//hitung Euclidean Distance Space
	function jarakEuclidean($data=array(),$centroid=array()){
		return sqrt(pow(($data[0]-$centroid[0]),2) + pow(($data[1]-$centroid[1]),2));
	}

	function jarakTerdekat($jarak_ke_centroid=array(),$centroid){
		foreach ($jarak_ke_centroid as $key => $value) {
			if(!isset($minimum)){
				$minimum=$value;
				$cluster=($key+1);
				continue;
			}
			else if($value<$minimum){
				$minimum=$value;
				$cluster=($key+1);
			}
		}
		return array(
			'cluster'=>$cluster,
			'value'=>$minimum,
		);
	}

	function perbaruiCentroid($table_iterasi,&$hasil_cluster){
		$hasil_cluster=[];
		//looping untuk mengelompokan x dan y sesuai cluster
		foreach ($table_iterasi as $key => $value) {
			$hasil_cluster[($value['jarak_terdekat']['cluster']-1)][0][]= $value['data'][0];//data x
			$hasil_cluster[($value['jarak_terdekat']['cluster']-1)][1][]= $value['data'][1];//data y
     //data z
		}
		$new_centroid=[];
		//looping untuk mencari nilai centroid baru dengan cara mencari rata2 dari masing2 data(0=x dan 1=y) 
		foreach ($hasil_cluster as $key => $value) {
			$new_centroid[$key]= [
				array_sum($value[0])/count($value[0]),
				array_sum($value[1])/count($value[1]),
			]; 
		}
		//sorting berdasarkan cluster
		ksort($new_centroid);
		return $new_centroid;
	}

	function centroidBerubah($centroid,$iterasi){
		$centroid_lama = flatten_array($centroid[($iterasi-1)]); //flattern array
		$centroid_baru = flatten_array($centroid[$iterasi]); //flatten array
		//hitbandingkan centroid yang lama dan baru jika berubah return true, jika tidak berubah/jumlah sama=0 return false
		$jumlah_sama=0;
		for($i=0;$i<count($centroid_lama);$i++){
			if($centroid_lama[$i]===$centroid_baru[$i]){
				$jumlah_sama++;
			}
		}
		return $jumlah_sama===count($centroid_lama) ? false : true; 
	}

	function flatten_array($arg) {
	  return is_array($arg) ? array_reduce($arg, function ($c, $a) { return array_merge($c, flatten_array($a)); },[]) : [$arg];
	}

	function pointingHasilCluster($hasil_cluster){
		$result=[];
		foreach ($hasil_cluster as $key => $value) {
			for ($i=0; $i<count($value[0]);$i++) { 
				$result[$key][]=[$hasil_cluster[$key][0][$i],$hasil_cluster[$key][1][$i]];
			}
		}
		return ksort($result);
	}

	//start program
	// get data dari database
$query = $koneksi->query("SELECT barang_dagang.id_barang, barang_dagang.nama_barang, SUM(barang_detail.jumlah_detail) AS barang_masuk, barang_keluar FROM barang_dagang LEFT JOIN barang_detail ON barang_dagang.id_barang=barang_detail.id_barang LEFT JOIN (SELECT barang_dagang.id_barang, SUM(pembelian_barang.jumlah_barang) AS barang_keluar FROM barang_dagang, pembelian_barang WHERE barang_dagang.id_barang=pembelian_barang.id_barang AND pembelian_barang.tanggal_pembelian BETWEEN '".$_GET['date1']."' AND '".$_GET['date2']."' GROUP BY pembelian_barang.id_barang ASC) AS barang ON barang_dagang.id_barang=barang.id_barang WHERE barang.id_barang IS NOT Null AND barang_detail.tanggal_masuk BETWEEN '".$_GET['date1']."' AND '".$_GET['date2']."' GROUP BY barang_dagang.id_barang ASC");
	$data=[];

	//masukan data jumlah guru dan siswa ke array data
	while($row=$query->fetch_assoc()){
		$data[]=[$row['barang_masuk'],$row['barang_keluar']];
	}
	
	//jumlah cluster
	$cluster = 3;
	$variable_x = 'Jumlah Barang Masuk';
	$variable_y = 'Jumlah Barang Keluar';
  

	$rand=[];
	//centroid awal ambil random dari data
	for($i=0;$i<$cluster;$i++){
		$temp=rand(0,(count($data)-1));
		$rand[]=$temp;
		$centroid[0][]=[
			$data[$rand[$i]][0],
			$data[$rand[$i]][1]
		];
	}
	
	$hasil_iterasi=[];
	$hasil_cluster=[];

	//iterasi
	$iterasi=0;
	while(true){
		$table_iterasi=array();
		//untuk setiap data ke i (x dan y)
		foreach ($data as $key => $value) {
			//untuk setiap table centroid pada iterasi ke i
			$table_iterasi[$key]['data']=$value;
			foreach ($centroid[$iterasi] as $key_c => $value_c) {
				//hitung jarak euclidean 
				$table_iterasi[$key]['jarak_ke_centroid'][]=jarakEuclidean($value,$value_c);	
			}
			//hitung jarak terdekat dan tentukan cluster nya
			$table_iterasi[$key]['jarak_terdekat']=jarakTerdekat($table_iterasi[$key]['jarak_ke_centroid'],$centroid);
		}
		array_push($hasil_iterasi, $table_iterasi);
		$centroid[++$iterasi]=perbaruiCentroid($table_iterasi,$hasil_cluster);
		$lanjutkan=centroidBerubah($centroid,$iterasi);
		$boolval = boolval($lanjutkan) ? 'ya' : 'tidak';
		// echo 'proses iterasi ke-'.$iterasi.' : lanjutkan iterasi ? '.$boolval.'<br>';
		if(!$lanjutkan)
			break;
		//loop sampai setiap nilai centroid sama dengan nilai centroid sebelumnya
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
             <!--  <form method="GET" action="" style="float: right; padding-right: 5px;">
                  <label class="control-label" for="date1">Filter Periode</label><br>
                  <input  class="input-lg" type="date" name="date1" value="<?php echo date('Y-m-d') ?>">
                  <label class="control-label" for="date2">&nbsp;To</label>
                  <input class="input-lg" type="date" name="date2" value="<?php echo date('Y-m-d') ?>">
                  <input class="btn btn-round btn-primary" type="submit" name="submit" value="filter">
                </form>     -->
                <table class="table table-bordered table-striped table-condensed">
                <br>
                <br>
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
                    <td>C<?php echo ($key_c+1); ?></td>
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
                    <td>C<?php echo ($key_c+1); ?></td>
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
										<td class="text-center">C<?php echo $value_data['jarak_terdekat']['cluster']; ?></td>
                </tr>
                <?php 
              } ?>
                </tbody>
            </table>
            <?php	}?>
            <!-- <?php ?> -->
           	<table class="table table-bordered table-striped table-condensed">
                <br> 
                <h5 class="mb"> Hasil Cluster</h5>
                <thead align="center">
                    <tr align="center">
                    <th rowspan="1">No</th>
                    <th rowspan="1">Nama_barang</th>
                    <th rowspan="1">Hasil Cluster</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $no= 1;
                
                foreach ($value as $key_data => $value_data) {  ?>
                <tr class="gradeX" align="center">
                    <td><?php echo $no; ?></td>
                    <td><?php echo $barang[$key_data]; ?></td>
					<td>C<?php echo $value_data['jarak_terdekat']['cluster']; ?></td>
					
                    
                </tr>
                <?php 
              $no++;
              }
               ?>
                </tbody>
            </table>
            </section>
          
         
        </div>
       
    </div>
</div>
<?php }?>
</section>
</section>
<script type="text/javascript">
var data=[];
var color=['red','green','blue'];
<?php foreach ($centroid[(count($centroid)-1)] as $key => $value) { ?>
		var dataPoints={
		    name: "Centroid <?php echo ($key+1); ?>",
		    color: 'yellow',
		    data: [{
			    x:<?php echo $value[0]; ?>,
			    y:<?php echo $value[1]; ?>
			}]
		};
		data.push(dataPoints);
<?php } ?>
<?php 
	foreach ($hasil_cluster as $key => $value) { ?>
		var dataPoints={
		    name: "Cluster <?php echo ($key+1); ?>",
		    color: color[<?php echo $key; ?>],
		    data: []
		};
<?php	for ($i=0; $i <count($value[0]) ; $i++) { ?>
	<?php	
			$nama_provinsi='';
			foreach ($data as $key_d => $value_d) { 
				if($value_d[0]==$value[0][$i] && $value_d[1]==$value[1][$i]){
					$nama_provinsi=$provinsi[$key_d];
				}
			} ?>
			dataPoints.data.push({
				name:"<?php echo $nama_provinsi; ?>",
				x:<?php echo $value[0][$i]; ?>,
				y:<?php echo $value[1][$i]; ?>
			});
<?php 	} ?>
		data.push(dataPoints);
<?php } ?>
console.log(data);
// break;
Highcharts.chart('chartContainer', {
    chart: {
        type: 'scatter',
        zoomType: 'xy'
    },
    title: {
        text: 'Klasterisasi Perbandingan Jumlah Stok Barang dan Jumlah Barang Keluar '
    },
    xAxis: {
        title: {
            enabled: true,
            text: 'Jumlah Stok'
        },
        startOnTick: true,
        endOnTick: true,
        showLastLabel: true
    },
    yAxis: {
        title: {
            text: 'Jumlah Keluar'
        }
    },
    plotOptions: {
        scatter: {
            marker: {
                radius: 5,
                states: {
                    hover: {
                        enabled: true,
                        lineColor: 'rgb(100,100,100)'
                    }
                }
            },
            states: {
                hover: {
                    marker: {
                        enabled: false
                    }
                }
            },
            tooltip: {
                headerFormat: '<b>{series.name} {point.key}</b><br>',
                pointFormat: '{point.x} guru, {point.y} siswa'
            }
        }
    },
    series: data
});


</script>