<?php
include ('../config/koneksi.php');

// Fungsi SQL Injection
function anti_injection($data){
  $filter  = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  return $filter;
}

$salt = '$%DSuTyr47542@#&*!=QxR094{a911}+';
$username = anti_injection($_POST['username']);
$password = anti_injection(hash('sha256',$salt.$_POST['password']));

// $username = anti_injection($_POST['username']);
// $password = anti_injection(md5($_POST['password']));

// menghindari sql injection
$injeksi_username = mysqli_real_escape_string($con, $username);
$injeksi_password = mysqli_real_escape_string($con, $password);

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($injeksi_username) OR !ctype_alnum($injeksi_password)){
 echo "<h3>Anda melakukan injeksi pada form login</h3>
        <p><a href='index.php'>LOGIN KEMBALI</a></p>";
}
else {
$login=mysqli_query($con,"SELECT * FROM users WHERE username='$injeksi_username' AND password='$injeksi_password' AND block='No'");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_assoc($login);

// Apabila username dan password ditemukan
  if ($ketemu > 0){
    session_start();

    $_SESSION['KCFINDER']=array();
    $_SESSION['KCFINDER']['disabled'] = false;
    $_SESSION['KCFINDER']['uploadURL'] = "../vendor/editor/gambar";
    $_SESSION['KCFINDER']['uploadDir'] = "";

    
    $_SESSION['username']   = $r['username'];
    $_SESSION['full_name']  = $r['full_name'];
    $_SESSION['password']   = $r['password'];
    $_SESSION['email']      = $r['email'];
    $_SESSION['level']      = $r['level'];
    
    header('location:media.php?module=home');
  }

  else {
    echo "<h3>Login Gagal! Username & Password salah.</h3>
     <p><a href='index.php'>Ulangi Lagi</a></p>"; 
  }
}
  
?>
