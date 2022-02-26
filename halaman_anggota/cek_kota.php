<?php

$id_provinsi_terpilih = $_POST["id_provinsi"];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$id_provinsi_terpilih,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: be908b05aa447c316db00dcf3b4587d0"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $array_reponse = json_decode($response,TRUE);
  $datakota = $array_reponse["rajaongkir"]["results"];


  echo"<pre>";
  print_r($datakota);
  echo "</pre>";

  echo "<option value=''>--Pilih Kota--</option>";

  foreach ($datakota as $key => $tiapkota) 
  {
    echo "<option value='' 
    id_kota = '".$tiapkota["city_id"]."' 
    nama_provinsi='".$tiapkota["province"]."' 
    nama_kota='".$tiapkota["city_name"]."' 
    tipe_kota='".$tiapkota["type"]."' 
    kodepos='".$tiapkota["postal_code"]."'         >";
    echo $tiapkota["type"]." ";
    echo $tiapkota["city_name"];
    echo "</option>";
}
}
?>