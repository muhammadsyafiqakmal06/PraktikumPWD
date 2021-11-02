<?php
include "koneksi.php";
$id_user = $_POST['id_user'];
 $nama = $_POST['nama_lengkap'];
 $email = $_POST['email'];
$pass = ($_POST['password']);
$sql = "INSERT INTO users(id_user,password, nama_lengkap, email) VALUES ('$id_user', '$pass', '$nama','$email')";
$query=mysqli_query($con, $sql);
mysqli_close($con);
header('location:tampil_user.php');
?>