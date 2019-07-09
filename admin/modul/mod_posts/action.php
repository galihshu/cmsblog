<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['user']) AND empty($_SESSION['password'])){
  echo "<h3>Untuk mengakses modul, Anda harus login dulu.</h3>
        <p><a href='../../index.php'>LOGIN</a></p>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else {
  include "../../../config/koneksi.php";
  include "../../../config/fungsi_seo.php";

  $module = $_GET['module'];
  $act    = $_GET['act'];

  // Input
  if ($module=='posts' AND $act=='input'){
    $lokasi_file = $_FILES['image']['tmp_name'];
    $tipe_file   = $_FILES['image']['type'];
    $nama_file   = $_FILES['image']['name'];
    $acak        = rand(1,99);
    $nama_gambar = $acak.$nama_file;

    if (!empty($_POST['seotitle'])){
      $seotag = $_POST['seotitle'];
      $tag     = implode(',',$seotag);
    }
    
    $title      = mysqli_real_escape_string($con,$_POST['title']);   
    $seotitle   = seo_title($_POST['title']);
    $category   = mysqli_real_escape_string($con,$_POST['category']);
    $intro      = mysqli_real_escape_string($con,$_POST['intro']);
    $content    = mysqli_real_escape_string($con,$_POST['content']);
    $active     = $_POST['active'];
    $caption    = mysqli_real_escape_string($con,$_POST['caption']);
    $date_created = date("Y-m-d H:i:s");

    // Apabila tidak ada gambar yang di upload
    if (empty($lokasi_file)){
      $input = "INSERT INTO posts(title,
                                  seotitle,     
                                  category_id, 
                                  username,
                                  intro,
                                  content,
                                  active,
                                  caption
                                  tag,
                                  date_created) 
                           VALUES('$title',
                                  '$seotitle', 
                                  '$category', 
                                  '$_SESSION[username]',
                                  '$intro',
                                  '$content',
                                  '$active',
                                  '$caption',
                                  '$tag',
                                  '$date_created')";
      mysqli_query($con, $input);

      header("location:../../media.php?module=posts");
    } 
    
    // Apabila ada gambar yang di upload
    else{
      if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
        echo "<script>window.alert('Upload Gagal! Pastikan file yang di upload bertipe *.JPG');
              window.location=('../../media.php?module=posts')</script>";
      }
      else{
        $folder = "../../../img_post/";
        $file_upload = $folder .$nama_gambar;
        // upload_gambar
        move_uploaded_file($lokasi_file, $file_upload);

        $input = "INSERT INTO posts(title,
                                  seotitle,     
                                  category_id, 
                                  username,
                                  intro,
                                  content,
                                  active,
                                  image,
                                  caption,
                                  tag,
                                  date_created) 
                           VALUES('$title',
                                  '$seotitle', 
                                  '$category', 
                                  '$_SESSION[username]',
                                  '$intro',
                                  '$content',
                                  '$active',
                                  '$nama_gambar',
                                  '$caption',
                                  '$tag',
                                  '$date_created')";
        mysqli_query($con, $input);

        header("location:../../media.php?module=posts");
      }
    }
  }

  // Update
  elseif ($module=='posts' AND $act=='update'){
    $lokasi_file = $_FILES['image']['tmp_name'];
    $tipe_file   = $_FILES['image']['type'];
    $nama_file   = $_FILES['image']['name'];
    $acak        = rand(1,99);
    $nama_gambar = $acak.$nama_file;

    if (!empty($_POST['seotitle'])){
      $seotag = $_POST['seotitle'];
      $tag     = implode(',',$seotag);
    }
    
    $title      = mysqli_real_escape_string($con,$_POST['title']);   
    $seotitle   = seo_title($_POST['title']);
    $category   = mysqli_real_escape_string($con,$_POST['category']);
    $intro      = mysqli_real_escape_string($con,$_POST['intro']);
    $content    = mysqli_real_escape_string($con,$_POST['content']);
    $active     = $_POST['active'];
    $caption    = mysqli_real_escape_string($con,$_POST['caption']);
    $date_created = date("Y-m-d H:i:s");
    $id         = mysqli_real_escape_string($con,$_POST['id']);


   
    // Apabila tidak ada gambar yang di upload
    if (empty($lokasi_file)){
      $update = "UPDATE posts SET title   = '$title',
                        seotitle        = '$seotitle', 
                        category_id     = '$category',
                        active          = '$active',
                        intro           = '$intro',
                        content         = '$content',
                        caption         = '$caption',   
                        tag             = '$tag' 
                WHERE id = '$id'";
        mysqli_query($con, $update);

        header("location:../../media.php?module=posts");
    } 

    // Apabila ada gambar yang di upload
    else{
      if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
        echo "<script>window.alert('Upload Gagal! Pastikan file yang di upload bertipe *.JPG');
              window.location=('../../media.php?module=posts')</script>";
      }
      else{
        $folder = "../../../img_post/";
        $file_upload = $folder .$nama_gambar;
        // upload_gambar
        move_uploaded_file($lokasi_file, $file_upload);

        $update = "UPDATE posts SET title   = '$title',
                        seotitle        = '$seotitle', 
                        category_id     = '$category',
                        active          = '$active',
                        intro           = '$intro',
                        content         = '$content',
                        image           = '$nama_gambar',
                        caption         = '$caption',   
                        tag             = '$tag' 
                WHERE id = '$id'";
        mysqli_query($con, $update);

        header("location:../../media.php?module=posts");
      }
    }
  }

  elseif ($module=='posts' AND $act=='delete'){
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT image FROM posts WHERE id='$id'";
    $hapus = mysqli_query($con, $query);
    $r     = mysqli_fetch_assoc($hapus);
    
    if ($r['image']!=''){
      $namafile = $r['image'];
      mysqli_query($con,"DELETE FROM posts WHERE id='$id'");
      unlink("../../../img_post/$namafile");
    }
    else{
       mysqli_query($con,"DELETE FROM posts WHERE id='$id'");
    }
    header("location:../../media.php?module=posts");
  }
}
?>
