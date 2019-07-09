<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['user']) AND empty($_SESSION['password'])){
  echo "<h3>Untuk mengakses modul, Anda harus login dulu.</h3>
        <p><a href='../../index.php'>LOGIN</a></p>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  include "../../../config/koneksi.php";

  $module = $_GET['module'];
  $act    = $_GET['act'];
  $salt = '$%DSuTyr47542@#&*!=QxR094{a911}+';

  // Input user
  if ($module=='users' AND $act=='input'){
    $username       = mysqli_real_escape_string($con, $_POST['username']);
    $full_name      = mysqli_real_escape_string($con, $_POST['full_name']);
    $email          = mysqli_real_escape_string($con, $_POST['email']);

    $pass           = mysqli_real_escape_string($con, hash('sha256',$salt.$_POST['password']));

    $query = "INSERT INTO users(username, password, full_name, email) 
                      VALUES('$username', '$pass', '$full_name', '$email')";

    mysqli_query($con, $query);
    header("location:../../media.php?module=users");
  }

  // Update user
  elseif ($module=='users' AND $act=='update'){
    $id           = mysqli_real_escape_string($con,$_POST['id']);
    $full_name    = mysqli_real_escape_string($con,$_POST['full_name']); 
    $email        = mysqli_real_escape_string($con,$_POST['email']);
    $block        = mysqli_real_escape_string($con,$_POST['block']);

   
    if ($_SESSION['level']=='admin'){
      // Apabila password tidak diubah (kosong)
      if (empty($_POST['password'])) {
        $query = "UPDATE users SET full_name = '$full_name',
                                  email = '$email',
                                  block = '$block'   
                        WHERE username   = '$id'";
        mysqli_query($con, $query);
      }
      // Apabila password diubah
      else {
        $password = mysqli_real_escape_string($con, hash('sha256',$salt.$_POST['password']));
        $query = "UPDATE users SET full_name   = '$full_name',
                                        email  = '$email',
                                        block  = '$block',
                                        password = '$password'    
                                WHERE username = '$id'";
        mysqli_query($con, $query);

      }
    }
    else {
      // Apabila password tidak diubah (kosong)
      if (empty($_POST['password'])) {
        $query = "UPDATE users SET full_name = '$full_name',
                                  email = '$email'   
                        WHERE username   = '$id'";
        mysqli_query($con, $query);
      }
      // Apabila password diubah
      else {
        $password = mysqli_real_escape_string($con, hash('sha256',$salt.$_POST['password']));
        $query = "UPDATE users SET full_name   = '$full_name',
                                        email  = '$email',
                                        password = '$password'    
                                WHERE username = '$id'";
        mysqli_query($con, $query);

      }
    }
    header("location:../../media.php?module=users");
  }
}
?>
