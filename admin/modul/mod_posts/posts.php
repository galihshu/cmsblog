<?php
// Apabila user belum login
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<h3>Untuk mengakses modul, Anda harus login dulu.</h3>
        <p><a href='index.php'>LOGIN</a></p>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session

else { 

	function GetCheckBox($table, $key, $Label, $Nilai='') {
	    include "../config/koneksi.php";
	    $s = "SELECT * FROM $table ORDER BY $Label";
	    $u = mysqli_query($con, $s);
	    $_arrNilai = explode(',', $Nilai);
	    $str = '';
	    while ($t = mysqli_fetch_array($u)) {
	      $_ck = (array_search($t[$key], $_arrNilai) === false)? '' : 'checked';
	      $str .= "<div class='form-check form-check-inline'>
					<input type='checkbox' class='form-check-input' name='".$key."[]' value='$t[$key]' $_ck><label class='form-check-label' for='tag'>$t[$Label]</label>
	      			</div>";
	    }
	    return $str;
  	}

	$aksi = "modul/mod_posts/action.php";

	// mengatasi variabel yang belum di definisikan (notice undefined index)
	$act = isset($_GET['act']) ? $_GET['act'] : ''; 

	switch($act){
	// All Users
    default: ?>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="media.php?module=home">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Posts</li>
		</ol>

        <div class="card mb-3">
        	<div class="card-header">
            	<i class="fas fa-table"></i>
            	All Posts
            </div>
      		<div class="card-body">
     			<?php
  				if ($_SESSION['level']=='admin'){
			        $query  = "SELECT * FROM posts ORDER BY date_created";
			        $hasil 	= mysqli_query($con, $query);
			        $posts 	= mysqli_fetch_all($hasil, MYSQLI_ASSOC);
		      	}
		      	else{
			        $query  = "SELECT * FROM posts WHERE username='$_SESSION[username]' ORDER BY date_created";
			        $hasil = mysqli_query($con, $query);
			        $posts 	= mysqli_fetch_all($hasil, MYSQLI_ASSOC);
		      	}
  				?>
  				
  				<p><input type="button" class="btn btn-primary" value="Add Post" onclick="window.location.href='?module=posts&act=add'"></p>

	            <div class="table-responsive">
	              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                <thead>
	                  <tr>
	                    <th>No</th>
	                    <th>Title</th>
	                    <th>Active</th>
	                    <th>Action</th>
	                  </tr>
	                </thead>
	                <tfoot>
	                  <tr>
	                    <th>No</th>
	                    <th>Title</th>
	                    <th>Active</th>
	                    <th>Action</th>
	                  </tr>
	                </tfoot>
	                <tbody>
	                	<?php
                		$no = 1;
							foreach($posts as $post) : 
  						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $post['title']; ?></td>
							<td><?php echo $post['active']; ?></td>
							<td>
							<center>
								<a class="btn btn-warning" href="?module=posts&act=edit&id=<?php echo $post['id'];?>">Edit</a>
								<a class="btn btn-danger" href="<?php echo $aksi .'?module=posts&act=delete&id=' . $post['id'];?>">Delete</a>
							</center>
							</td>
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
				<li class="breadcrumb-item active">Add Post</li>
			</ol>
			<div class="card mb-3">
	        	<div class="card-header">
	            	<i class="fas fa-table"></i>
	            	Form Post
	           	</div>
          		<div class="card-body">
          			<form method="POST" action="<?php echo $aksi .'?module=posts&act=input'; ?>" enctype="multipart/form-data">
						<div class="form-group">
							<label for="exampleInputTitle">Title</label>
							<input type="text" name="title" class="form-control" id="title"placeholder="Title">
						</div>
												
						<div class="form-group">
							<label for="category">Category</label>
							<select class="form-control" name="category" id="category">
								<option value="" selected>Choose Category</option>
								<?php
								$query  = "SELECT * FROM categories ORDER BY title";
            					$hasil = mysqli_query($con, $query);
            					$data 	= mysqli_fetch_all($hasil, MYSQLI_ASSOC);	

            					foreach ($data as $a) : 
								?>
								<option value="<?php echo $a['id']; ?>"><?php echo $a['title']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
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
						<div class="form-group">
							<label for="content">Intro</label>
							<textarea class="form-control" name="intro" style="height: 150px;"></textarea>
  						</div>
						<div class="form-group">
							<label for="content">Content</label>
							<textarea class="form-control indosmart" name="content" style="height: 350px;"></textarea>
  						</div>
  						<div class="form-group">
							<label for="exampleFormControlFile1">Image</label>
							<input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
						</div>

						<div class="form-group">
							<label for="exampleInputTitle">Image Caption</label>
							<input type="text" name="caption" class="form-control" id="caption"placeholder="Image Caption">
						</div>

						<?php
						$tag = mysqli_query($con,"SELECT * FROM tags ORDER BY seotitle");
						?>

  						<div class="form-group">
  							<label for="tag">Tags</label><br>
  							<?php
  							while ($t=mysqli_fetch_array($tag)) { ?>
  							<div class="form-check form-check-inline">
  								<input class="form-check-input" type="checkbox" name="seotitle[]" value="<?php echo $t['seotitle']; ?>">
  								<label class="form-check-label" for="tag"><?php echo $t['title']; ?></label>
							</div>
							<?php } ?>
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
			$query = "SELECT * FROM posts WHERE id='$_GET[id]'";
			$hasil = mysqli_query($con, $query);
			$r     = mysqli_fetch_assoc($hasil);

	      	?>
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="media.php?module=home">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">Edit Post</li>
			</ol>
			<div class="card mb-3">
	        	<div class="card-header">
	            	<i class="fas fa-table"></i>
	            	Form Post
	           	</div>
          		<div class="card-body">
          			<form method="POST" action="<?php echo $aksi . '?module=posts&act=update'; ?>" enctype="multipart/form-data">
          				<input type="hidden" name="id" value="<?php echo $r['id']; ?>">
						<div class="form-group">
							<label for="exampleInputTitle">Title</label>
							<input type="text" name="title"  value="<?php echo $r['title']; ?>" class="form-control" id="title"placeholder="Title">
						</div>

						<div class="form-group">
							<label for="category">Category</label>
							<select class="form-control" name="category" id="category">
								<?php if($r['category_id']=="") { ?>
									<option value="" selected>Choose Category</option>
								<?php } 
									$query  = "SELECT * FROM categories ORDER BY title";
	            					$hasil = mysqli_query($con, $query);
	            					$data 	= mysqli_fetch_all($hasil, MYSQLI_ASSOC);	

	            					foreach ($data as $a) : 
	            						if ($r['category_id']==$a['id']){
										?>
											<option value="<?php echo $a['id']; ?>" selected><?php echo $a['title']; ?></option>
										<?php 
										}
										else { 
										?>
											<option value="<?php echo $a['id']; ?>"><?php echo $a['title']; ?></option>
									<?php }
									endforeach; 
									?>
							</select>
						</div>

						<?php
						if ($r['active']=='Yes'){
						?>
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
						<?php
						}
						else { ?>
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
						<?php
						}
						?>
						<div class="form-group">
							<label for="content">Intro</label>
							<textarea class="form-control" name="intro" style="height: 150px;"> <?php echo $r['intro']; ?></textarea>
  						</div>
						<div class="form-group">
							<label for="content">Content</label>
							<textarea class="form-control indosmart" name="content" style="height: 350px;"><?php echo $r['content']; ?></textarea>
  						</div>
  						<div class="form-group">
							<label for="gambar">Image</label><br>
							<a href="../img_post/<?php echo $r['image']; ?>">
							  <img src="../img_post/<?php echo $r['image']; ?>" width=250 class="rounded">
							</a>
						</div>  
  						<div class="form-group">
							<label for="exampleFormControlFile1">Change Image</label>
							<input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
						</div>

						<div class="form-group">
							<label for="exampleInputTitle">Image Caption</label>
							<input type="text" name="caption"  value="<?php echo $r['caption']; ?>" class="form-control" id="caption" placeholder="Image Caption">
						</div>

  						<?php
  						$d = GetCheckBox('tags', 'seotitle', 'title', $r['tag']);
						?>
  						<div class="form-group">
  							<label for='tag'>Tags</label><br>
  							<?php echo $d; ?>
						</div>

						<button type="submit" class="btn btn-primary">Update</button>
						<button type="button" class="btn btn-success" onclick="self.history.back()">Cancel</button>
					</form>
          		</div>
	        </div>

		<?php 
      	break;
	}
}
?>