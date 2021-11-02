<?php
include "koneksi.php";
$id_user = $_POST['id_user'];
$pass=($_POST['password']);
$sql="SELECT * FROM users WHERE id_user='$id_user' AND password='$pass'";
$login=mysqli_query($con,$sql);
$ketemu=mysqli_num_rows($login);
$r= mysqli_fetch_array($login);
if ($ketemu > 0){
 session_start();
 $_SESSION['id_user'] = $r['id_user'];
 $_SESSION['password_user'] = $r['password'];
echo"USER BERHASIL LOGIN<br>";
echo "id_user =",$_SESSION['id_user'],"<br>";
echo "password=",$_SESSION['password_user'],"<br>";
echo "<a href=logout.php><b>LOGOUT</b></a></center>";
}
else{
echo "<center>Login gagal! username & password tidak benar<br>";
echo "<a href=form_login.php><b>ULANGILAGI</b></a></center>";
}
mysqli_close($con);
?>