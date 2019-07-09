<?php
  include ('config/koneksi.php');

  $query = "SELECT * FROM posts ORDER BY date_created DESC";
  $hasil = mysqli_query($con,$query);
  $posts = mysqli_fetch_all($hasil, MYSQLI_ASSOC);

  $web_title = "Smart Blog - My Personal Blog";
  $judul = "My Personal Blog";
  $subjudul = "Belajar Membuat Blog Sederhana";
  $banner = "assets/img/home-bg.jpg";

  include ('header.php');
?>  

<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <?php foreach($posts as $post) : ?>
        <div class="post-preview">
          <a href="post.php?id=<?php echo $post['id'];?>">
            <h2 class="post-title">
              <?php echo $post['title']; ?>
            </h2>
          </a>
          <p><?php if(empty($_POST['intro'])){
                        echo substr($post['content'],0,350) . '...';
              }
              else {
                echo $post['intro'];
              }
              ?>
              
          </p>
          <p class="post-meta">Posted on <?php echo date("d F Y H:i:s", strtotime($post['date_created']));?></p>
        </div>
        <hr>
      <?php endforeach; ?>
      <!-- Pager -->
      <div class="clearfix">
        <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
      </div>
    </div>
  </div>
</div>

<hr>

<?php 
  include ('footer.php');
?>