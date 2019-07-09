<?php
// Apabila user belum login
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<h3>Untuk mengakses modul, Anda harus login dulu.</h3>
        <p><a href='index.php'>LOGIN</a></p>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session

else { 
	$aksi = "modul/mod_categories/action.php";

	// mengatasi variabel yang belum di definisikan (notice undefined index)
	$act = isset($_GET['act']) ? $_GET['act'] : ''; 

	switch($act){
	// All Users
    default: ?>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="media.php?module=home">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Categories</li>
		</ol>

        <div class="card mb-3">
        	<div class="card-header">
            	<i class="fas fa-table"></i>
            	All Categories
            </div>
      		<div class="card-body">
      			<?php
  				    $query  = "SELECT * FROM categories ORDER BY id DESC";
			        $hasil 	= mysqli_query($con, $query);
			        $data  	= mysqli_fetch_all($hasil, MYSQLI_ASSOC);
  				?>

  				<p><input type="button" class="btn btn-primary" value="Add Category" onclick="window.location.href='?module=categories&act=add'"></p>

	            <div class="table-responsive">
	              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                <thead>
	                  <tr>
	                    <th>No</th>
	                    <th>Category Name</th>
	                    <th>Link</th>
	                    <th>Active</th>
	                    <th>Action</th>
	                  </tr>
	                </thead>
	                <tfoot>
	                  <tr>
	                    <th>No</th>
	                    <th>Category Name</th>
	                    <th>Link</th>
	                    <th>Active</th>
	                    <th>Action</th>
	                  </tr>
	                </tfoot>
	                <tbody>
	                	<?php
                		$no = 1;
							foreach($data as $r) : 
  						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $r['title']; ?></td>
							<td><?php echo "category-$r[id]-$r[seotitle].html"; ?></td>
							<td><?php echo $r['active']; ?></td>
							<td><center><a class="btn btn-warning" href="?module=categories&act=edit&id=<?php echo $r['id'];?>">Edit</a></center></td>
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
        	<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="media.php?module=home">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">Add Category</li>
			</ol>
			<div class="card mb-3">
	        	<div class="card-header">
	            	<i class="fas fa-table"></i>
	            	Form Category
	           	</div>
          		<div class="card-body">
          			<form method="POST" action="<?php echo $aksi .'?module=categories&act=input'; ?>">
						<div class="form-group">
							<label for="exampleInputTitle">Category Name</label>
							<input type="text" name="title" class="form-control" id="title"placeholder="Category Name">
						</div>
						<button type="submit" class="btn btn-primary">Save</button>
						<button type="button" class="btn btn-success" onclick="self.history.back()">Cancel</button>
					</form>
          		</div>
	        </div>

		<?php 
      	break;

      	case "edit" : ?>
        	<?php 
			$query = "SELECT * FROM categories WHERE id='$_GET[id]'";
			$hasil = mysqli_query($con, $query);
			$r     = mysqli_fetch_assoc($hasil);

	      	?>
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="media.php?module=home">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">Edit Category</li>
			</ol>
			<div class="card mb-3">
	        	<div class="card-header">
	            	<i class="fas fa-table"></i>
	            	Form Category
	           	</div>
          		<div class="card-body">
          			<form method="POST" action="<?php echo $aksi . '?module=categories&act=update'; ?>">
          				<input type="hidden" name="id" value="<?php echo $r['id']; ?>">
						<div class="form-group">
							<label for="exampleInputTitle">Category Name</label>
							<input type="text" name="title" value="<?php echo $r['title']; ?>" class="form-control" id="title" placeholder="Category Name">
						</div>
						<?php 
						if ($r['active']=='No'){
						?>
						<div class="form-group">
							<label for="block">Active</label>
							<div class="form-check form-check">
								<input class="form-check-input" type="radio" name="active" id="Radio1" value="Yes">
								<label class="form-check-label" for="Radio1">Yes</label>
							</div>
							<div class="form-check form-check">
								<input class="form-check-input" type="radio" name="active" id="Radio2" value="No" checked>
								<label class="form-check-label" for="Radio2">No</label>
							</div>
						</div>
						<?php }
						else { ?>
							<div class="form-group">
								<label for="block">Active</label>
								<div class="form-check form-check">
									<input class="form-check-input" type="radio" name="active" id="Radio1" value="Yes" checked>
									<label class="form-check-label" for="Radio1">Yes</label>
								</div>
								<div class="form-check form-check">
									<input class="form-check-input" type="radio" name="active" id="Radio2" value="No">
									<label class="form-check-label" for="Radio2">No</label>
								</div>
							</div>
						<?php } ?>
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

	