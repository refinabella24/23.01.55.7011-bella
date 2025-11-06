<?php
$nama = $_POST['nama'];
$nip = $_POST['nip'];
$tgl_lahir = $_POST['tgl_lahir'];
$jabatan = $_POST['jabatan'];
$golongan = $_POST['golongan'];
$agama = $_POST['agama'];
$pendidikan = $_POST['pendidikan'];

$curl = curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://andriyanti.site/bella/api.php/records/pegawai',
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'POST',
	CURLOPT_POSTFIELDS => array('nama' => $nama, 'nip' => $nip, 'tgl_lahir' => $tgl_lahir, 'id_jabatan' => $jabatan, 'id_golongan' => $golongan, 'id_agama' => $agama, 'id_pendidikan' => $pendidikan),
));
$response = curl_exec($curl);
curl_close($curl);

header('Location: index.php');
die();