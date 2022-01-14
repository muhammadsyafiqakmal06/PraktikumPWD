<?php
include "config.php";
$sql="select * from jadwal order by id";
$tampil = mysqli_query($koneksi,$sql);
if (mysqli_num_rows($tampil) > 0) {
$no=1;
$response = array();
 $response["data"] = array();
while ($r = mysqli_fetch_array($tampil)) {
 $h['id'] = $r['id'];
 $h['kegiatan'] = $r['kegiatan'];
 $h['mulai'] = $r['mulai'];
 $h['selesai'] = $r['selesai'];
 array_push($response["data"], $h);
 }
 echo json_encode($response);
}
else {
 $response["message"]="tidak ada data";
 echo json_encode($response);
 }
?>