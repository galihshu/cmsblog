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
  include "../../../config/fungsi_seo.php";

  $module = $_GET['module'];
  $act    = $_GET['act'];

  // Input
  if ($module=='categories' AND $act=='input'){
    $title        = mysqli_real_escape_string($con, $_POST['title']);
    $seotitle     = seo_title($_POST['title']);
    
    $query = "INSERT INTO categories(title,seotitle) 
                      VALUES('$title','$seotitle')";

    mysqli_query($con, $query);
    header("location:../../media.php?module=categories");
  }

  // Update
  elseif ($module=='categories' AND $act=='update'){
    $title        = mysqli_real_escape_string($con, $_POST['title']);
    $seotitle     = seo_title($_POST['title']);
    $id           = mysqli_real_escape_string($con, $_POST['id']);
    $active       = $_POST['active'];

   
    $query = "UPDATE categories SET title = '$title',
                              seotitle = '$seotitle',
                              active = '$active'   
                    WHERE id   = '$id'";
    mysqli_query($con, $query);
      header("location:../../media.php?module=categories");
  }
}
?>
