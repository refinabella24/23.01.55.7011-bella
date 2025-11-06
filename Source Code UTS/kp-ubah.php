<?php
$id = $_POST['id'];
$pegawai = $_POST['pegawai'];
$golongan = $_POST['golongan'];
$tgl_sk = $_POST['tgl_sk'];
$no_sk = $_POST['no_sk'];
$tmt = $_POST['tmt'];

$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://andriyanti.site/bella/api.php/records/kp/'.$id,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'PUT',
	CURLOPT_POSTFIELDS => 'id_pegawai='.$pegawai.'&id_golongan='.$golongan.'&tgl_sk='.$tgl_sk.'&no_sk='.$no_sk.'&tmt='.$tmt,
	CURLOPT_HTTPHEADER => array(
		'Content-Type: application/x-www-form-urlencoded'
	),
));
$response = curl_exec($curl);
curl_close($curl);

header('Location: kp.php');
die();