<?php
$apikeysimak = "db429eff98bdfbad5db82761504d2225";//TA Client
function curl_post($url,$uid,$password){
	global $apikeysimak;
	if (!function_exists('curl_init')){ 
        die('CURL is not installed!');
    }
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json', "X-API-KEY: $apikeysimak"));
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array('uid'=> $uid, 'password'=> $password)));
	$result=curl_exec($ch);
	curl_close($ch);
	return $result;
	/**
	jika benar
{"login":"STATUS_LOGIN_OK","uid":"42516015","email":"anggereanir@gmail.com","id_role":"5","role":"Mahasiswa","uk":"D4 - Teknik Komputer dan Jaringan","nama":"Rina Anggereani Idris","status":"1","foto":"https:\/\/simak.poliupg.ac.id\/assets\/img\/useravatar\/42516015_d78080a386f02a63f67163a2737eae51_avatar.jpg"}

jika salah
{"error":"not found"}
/**/
	//return json_decode($result,true);
}

function curl_get($url){
	global $apikeysimak;
	if (!function_exists('curl_init')){ 
        die('CURL is not installed!');
    }
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json', "X-API-KEY: $apikeysimak"));
	$result=curl_exec($ch);
	curl_close($ch);
	return $result;
	//return json_decode($result,true);
}

/* untuk mendapatkan informasi login mahasiswa */
// echo $status = curl_post("https://simak.poliupg.ac.id/api/machine/post_login","42516015","MILIKBERSAMA");
// $arstatus = json_decode($status,true);
// if(isset($arstatus['error']))	echo "Password salah";
// else echo "Hello ". $arstatus['nama'];
/**/

$datamhs = curl_get("https://simak.poliupg.ac.id/api/machine/get_tabel_konten/bri_mhs_aktif/thn_ajar/20201/kode_prodi/425");
//$datamhsnew = "{data: ".$datamhs."}";

$armhs['data'] = json_decode($datamhs);
//print_r($armhs);
file_put_contents("data.txt",json_encode($armhs));

//echo "<table border =1><th>Idx</th><th>NIM</th><th>Nama</th><th>IP</th><th>IPK</th>";
//foreach ($armhs as $idx => $mhs) {
//	echo "<tr>";
//	echo "<td> $idx </td> <td> $mhs[nim] </td> <td> $mhs[nama] </td> <td> $mhs[IP] </td> <td> $mhs[IPK] </td>";
//	echo "<tr>";
//}
//echo "</table>";
//echo $json = curl_get("https://simak.poliupg.ac.id/api/machine/get_dosen");

//echo $json = curl_get("https://simak.poliupg.ac.id/api/machine/get_tahun_ajar/aktif/1");
//echo $json = curl_get("https://simak.poliupg.ac.id/api/machine/get_mahasiswa/42518068");

//echo $json = curl_get("https://simak.poliupg.ac.id/api/machine/get_mahasiswa/nim/42518068");
//echo $json = curl_get("https://simak.poliupg.ac.id/api/machine/get_pegawai/nip/197908232010121001");
//$json = curl_get("https://simak.poliupg.ac.id/api/machine/get_mahasiswa/kode_status_mhs/AJ");
//echo $json = curl_get("https://simak.poliupg.ac.id/api/machine/get_tabel_konten/bri_mhs_aktif/thn_ajar/20181");
//echo $json = curl_get("https://simak.poliupg.ac.id/api/machine/get_tabel_konten/bri_mhs_aktif/thn_ajar/20181/kode_prodi/452");
//echo $json = curl_get("https://simak.poliupg.ac.id/api/machine/get_tabel_konten/login");//{"error":"not found"}
?>