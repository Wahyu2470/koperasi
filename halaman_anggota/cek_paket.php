<?php

$kiriman = $_POST["kiriman"];
$kota = $_POST["kota"];
$berat = $_POST["berat"];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=78&destination=".$kota."&weight=".$berat."&courier=".$kiriman,
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: be908b05aa447c316db00dcf3b4587d0"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $array_response = json_decode($response,TRUE);
  $datapaket = $array_response["rajaongkir"]["results"]["0"]["costs"];

  echo "<option value=''>--Pilih Paket</option>";
  foreach ($datapaket as $key => $tiap_paket) 
  {
  	echo "<option
  	paket='".$tiap_paket['service']."'
  	ongkir='".$tiap_paket["cost"]["0"]["value"]."'
  	etd='".$tiap_paket["cost"]["0"]["etd"]."'>";
  	echo $tiap_paket["service"]." ";
  	echo number_format($tiap_paket["cost"]["0"]["value"])." ";
  	echo $tiap_paket["cost"]["0"]["etd"];
  	echo "</option>";
  }
}
?>