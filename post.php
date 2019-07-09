<?php
  include ('config/koneksi.php');

  $id = $_GET['id'];

  $query = "SELECT * FROM posts WHERE id='$id'";
  $hasil = mysqli_query($con,$query);
  $post = mysqli_fetch_assoc($hasil);

  $web_title = $post['title'];
  $judul = $post['title'];
  $subjudul = "";
  $banner = "img_post/$post[image]";

  include ('header.php');
?>  

<!-- Post Content -->
<article>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <?php echo nl2br($post['content']); ?>
      </div>
    </div>
  </div>
</article>

<hr>

<?php 
  include ('footer.php');
?>