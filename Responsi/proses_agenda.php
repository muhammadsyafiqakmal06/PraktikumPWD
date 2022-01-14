<?php

//mengambil data dari form input
$kegiatan   = $_POST['kegiatan'];
$mulai      = $_POST['mulai'];
$selesai    = $_POST['selesai'];

//membuat koneksi ke database
$koneksi = mysqli_connect('localhost', 'root', '', 'profile_perusahaan');

//insert data ke dalam database
mysqli_query($koneksi, "insert into jadwal set kegiatan='$kegiatan', mulai='$mulai', selesai='$selesai' ");


//kembali ke halaman index.php
header("location: agenda.php");

?>