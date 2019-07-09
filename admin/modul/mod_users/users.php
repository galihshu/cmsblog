<?php
// Apabila user belum login
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<h3>Untuk mengakses modul, Anda harus login dulu.</h3>
        <p><a href='index.php'>LOGIN</a></p>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session

else { 
	$aksi = "modul/mod_users/action.php";

	// mengatasi variabel yang belum di definisikan (notice undefined index)
	$act = isset($_GET['act']) ? $_GET['act'] : ''; 

	switch($act){
	// All Users
    default: ?>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="media.php?module=home">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Users</li>
		</ol>

        <div class="card mb-3">
        	<div class="card-header">
            	<i class="fas fa-table"></i>
            	All Users
            </div>
      		<div class="card-body">
      			<?php
  				if ($_SESSION['level']=='admin'){
			        $query  = "SELECT * FROM users ORDER BY username";
			        $hasil 	= mysqli_query($con, $query);
			        $users 	= mysqli_fetch_all($hasil, MYSQLI_ASSOC);
			        echo "<p><input type='button' class='btn btn-primary' value='Add User' onclick=window.location.href='?module=users&act=add'></p>";
		      	}
		      	else{
			        $query  = "SELECT * FROM users WHERE username='$_SESSION[username]'";
			        $hasil = mysqli_query($con, $query);
			        $users 	= mysqli_fetch_all($hasil, MYSQLI_ASSOC);
		      	}
  				?>

	            <div class="table-responsive">
	              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                <thead>
	                  <tr>
	                    <th>No</th>
	                    <th>Username</th>
	                    <th>Full Name</th>
	                    <th>Email</th>
	                    <th>Level</th>
	                    <th>Block</th>
	                    <th>Action</th>
	                  </tr>
	                </thead>
	                <tfoot>
	                  <tr>
	                    <th>No</th>
	                    <th>Username</th>
	                    <th>Full Name</th>
	                    <th>Email</th>
	                    <th>Level</th>
	                    <th>Block</th>
	                    <th>Action</th>
	                  </tr>
	                </tfoot>
	                <tbody>
	                	<?php
                		$no = 1;
							foreach($users as $user) : 
  						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $user['username']; ?></td>
							<td><?php echo $user['full_name']; ?></td>
							<td><?php echo $user['email']; ?></td>
							<td><?php echo $user['level']; ?></td>
							<td><?php echo $user['block']; ?></td>
							<td><center><a class="btn btn-warning" href="?module=users&act=edit&id=<?php echo $user['username'];?>">Edit User</a></center></td>
						</tr>
						<?php
						$no++;
						endforeach;
						?>
	                </tbody>
	            </table>
	    	</div>
        </div>
	</div>
     <?php break;

        case "add" : ?>
        	<?php if ($_SESSION['level']=='admin'){ ?>
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="media.php?module=home">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">Add User</li>
			</ol>
			<div class="card mb-3">
	        	<div class="card-header">
	            	<i class="fas fa-table"></i>
	            	Form User
	           	</div>
          		<div class="card-body">
          			<form method="POST" action="<?php echo $aksi .'?module=users&act=input'; ?>">
						<div class="form-group">
							<label for="exampleInputUsername">Username</label>
							<input type="text" name="username" class="form-control" id="username"placeholder="Username">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword">Password</label>
							<input type="password" name="password" class="form-control" id="password" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="exampleInputFullname">Full Name</label>
							<input type="text" name="full_name" class="form-control" id="full_name" placeholder="Full Name">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail">Email</label>
							<input type="email" name="email" class="form-control" id="email" placeholder="Email">
						</div>
						<button type="submit" class="btn btn-primary">Save</button>
						<button type="button" class="btn btn-success" onclick="self.history.back()">Cancel</button>
					</form>
          		</div>
	        </div>

		<?php 
		}
      	else {
        	echo "<p>Anda tidak berhak mengakses halaman ini.</p>";
      	}
      	break;

      	case "edit" : 
			$query = "SELECT * FROM users WHERE username='$_GET[id]'";
			$hasil = mysqli_query($con, $query);
			$r     = mysqli_fetch_assoc($hasil);

	      	?>
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="media.php?module=home">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">Edit User</li>
			</ol>
			<div class="card mb-3">
	        	<div class="card-header">
	            	<i class="fas fa-table"></i>
	            	Form User
	           	</div>
          		<div class="card-body">
          			<form method="POST" action="<?php echo $aksi . '?module=users&act=update'; ?>">
          				<input type="hidden" name="id" value="<?php echo $r['username']; ?>">
						<div class="form-group">
							<label for="exampleInputUsername">Username **)</label>
							<input type="text" name="username" value="<?php echo $r['username']; ?>" class="form-control" id="username"placeholder="Username" disabled>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword">Password *)</label>
							<input type="password" name="password" class="form-control" id="password" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="exampleInputFullname">Full Name</label>
							<input type="text" name="full_name" value="<?php echo $r['full_name']; ?>" class="form-control" id="full_name" placeholder="Full Name">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail">Email</label>
							<input type="email" name="email" value="<?php echo $r['email']; ?>" class="form-control" id="email" placeholder="Email">
						</div>

						<?php
						if ($_SESSION['level']=='admin'){ 
							if ($r['block']=='No'){
							?>
							<div class="form-group">
								<label for="block">Block User</label>
								<div class="form-check form-check">
									<input class="form-check-input" type="radio" name="block" id="Radio1" value="Yes">
									<label class="form-check-label" for="Radio1">Yes</label>
								</div>
								<div class="form-check form-check">
									<input class="form-check-input" type="radio" name="block" id="Radio2" value="No" checked>
									<label class="form-check-label" for="Radio2">No</label>
								</div>
							</div>
							<?php }
							else { ?>
								<div class="form-group">
									<label for="block">Block User</label>
									<div class="form-check form-check">
										<input class="form-check-input" type="radio" name="block" id="Radio1" value="Yes" checked>
										<label class="form-check-label" for="Radio1">Yes</label>
									</div>
									<div class="form-check form-check">
										<input class="form-check-input" type="radio" name="block" id="Radio2" value="No">
										<label class="form-check-label" for="Radio2">No</label>
									</div>
								</div>
							<?php } 
						} ?>


						<div class='form-group'>
							<p>*) Apabila password tidak diubah, dikosongkan saja.<br />
                                **) Username tidak bisa diubah.</p>
                        </div>
						<button type="submit" class="btn btn-primary">Save</button>
						<button type="button" class="btn btn-success" onclick="self.history.back()">Cancel</button>
					</form>
          		</div>
	        </div>

		<?php 
      	break;
	}
}
?>

	