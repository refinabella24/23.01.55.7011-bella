<?php
$pegawai = $_POST['pegawai'];
$tgl_sk = $_POST['tgl_sk'];
$no_sk = $_POST['no_sk'];
$gaji = $_POST['gaji'];
$tgl_berlaku = $_POST['tgl_berlaku'];

$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://andriyanti.site/bella/api.php/records/kgb',
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'POST',
	CURLOPT_POSTFIELDS => array('id_pegawai' => $pegawai, 'tgl_sk' => $tgl_sk, 'no_sk' => $no_sk, 'gaji' => $gaji, 'tgl_berlaku' => $tgl_berlaku),
));
$response = curl_exec($curl);
curl_close($curl);

header('Location: kgb.php');
die();