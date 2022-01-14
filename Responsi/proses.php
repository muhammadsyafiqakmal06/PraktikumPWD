<?php
session_start();
include "config.php";
$id_user = $_POST['username'];
$pass=($_POST['password']);
$sql="SELECT * FROM user WHERE username='$id_user' AND password='$pass'";
if ($_POST["captcha_code"] == $_SESSION["captcha_code"]) {
 
$login=mysqli_query($koneksi,$sql);
$ketemu=mysqli_num_rows($login);
$r= mysqli_fetch_array($login);
if ($ketemu > 0){
 $_SESSION['username'] = $r['username'];
 $_SESSION['password_user'] = $r['password'];
echo"USER BERHASIL LOGIN<br>";
echo "username =",$_SESSION['username'],"<br>";
echo "password=",$_SESSION['password_user'],"<br>";
echo "<a href=logout.php><b>LOGOUT</b></a></center>";
}
else{
 echo "<center>Login gagal! username & password tidak benar<br>";
 echo "<a href=login.php><b>ULANGI LAGI</b></a></center>";
}
mysqli_close($koneksi); 
} 
else {
echo "<center>Login gagal! Captcha tidak sesuai<br>";
 echo "<a href=login.php><b>ULANGI LAGI</b></a></center>"; }
?>