<?php
include "config.php"; 
header('Content-Type: text/xml');
$query = "SELECT * FROM jadwal";
$hasil = mysqli_query($koneksi,$query);
$jumField = mysqli_num_fields($hasil);
echo "<?xml version='1.0'?>";
echo "<data>";
while ($data = mysqli_fetch_array($hasil))
{
 echo "<jadwal>";
 echo"<id>",$data['id'],"</id>";
 echo"<kegiatan>",$data['kegiatan'],"</kegiatan>";
 echo"<mulai>",$data['mulai'],"</mulai>";
 echo"<selesai>",$data['selesai'],"</selesai>";
 echo "</jadwal>";
}
echo "</data>";
?>