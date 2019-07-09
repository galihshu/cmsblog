<?php
// Apabila user belum login
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<h3>Untuk mengakses modul, Anda harus login dulu.</h3>
        <p><a href='index.php'>LOGIN</a></p>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session

else { 
?>

        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="media.php?module=home">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-file-alt"></i>
                </div>
                <?php
                  $query = mysqli_query($con,"SELECT * FROM posts");
                  $jmlartikel = mysqli_num_rows($query);
                  $totalartikel = number_format($jmlartikel,0,',','.');
                ?>
                <div class="mr-5"><?php echo "$totalartikel Posts"; ?></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="media.php?module=posts">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-folder"></i>
                </div>
                <?php
                  $query = mysqli_query($con,"SELECT * FROM categories");
                  $jmlkategori = mysqli_num_rows($query);
                  $totalkategori = number_format($jmlkategori,0,',','.');
                ?>
                <div class="mr-5"><?php echo "$totalkategori Categories"; ?></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="media.php?module=categories">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-image"></i>
                </div>
                <div class="mr-5">123 Images</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-images"></i>
                </div>
                <div class="mr-5">13 Albums</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <div class="row">
			<div class="col-xl-6 col-md-6 col-sm-12">
		        <div class="card mb-3">
		          <div class="card-header">
		            <i class="fas fa-table"></i>
		            User Info</div>
		          	<div class="card-body">
						<table class="table">
							<tbody>
								<tr>
									<th>Full Name</th>
									<th>:</th>
									<td><?php echo $_SESSION['full_name']; ?></td>
								</tr>
								<tr>
									<th>Username</th>
									<th>:</th>
									<td><?php echo $_SESSION['username']; ?></td>
								</tr>
								<tr>
									<th>Email</th>
									<th>:</th>
									<td><?php echo $_SESSION['email']; ?></td>
								</tr>
								<tr>
									<th>Level</th>
									<th>:</th>
									<td><?php echo $_SESSION['level']; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>				
			<div class="col-xl-6 col-md-6 col-sm-12">
				<div class="card mb-3">
		          <div class="card-header">
		            <i class="fas fa-table"></i>
		            Other Info</div>
		          	<div class="card-body">
						<table class="table">
							<tbody>
								<tr>
									<th>Last Login</th>
									<th>:</th>
									<td><?php echo date('d-m-Y'); ?></td>
								</tr>
								<tr>
									<th>IP Address</th>
									<th>:</th>
									<td><?php echo $_SERVER["REMOTE_ADDR"]; ?></td>
								</tr>
								<tr>
									<th>Server</th>
									<th>:</th>
									<td><?php echo $_SERVER['SERVER_NAME']; ?></td>
								</tr>
								<tr>
									<th>Browser</th>
									<th>:</th>
									<td><?php echo $_SERVER["HTTP_USER_AGENT"]; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
<?php } ?>