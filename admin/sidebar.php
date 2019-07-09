    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="media.php?module=home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-file"></i>
          <span>Posts</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="media.php?module=posts">All Posts</a>
          <?php if ($_SESSION['level']=='admin'){ ?>
          <a class="dropdown-item" href="media.php?module=categories">Categories</a>
          <a class="dropdown-item" href="media.php?module=tags">Tags</a>
          <?php } ?>
        </div>
      </li>
      <?php if ($_SESSION['level']=='admin'){ ?>
      <li class="nav-item">
        <a class="nav-link" href="media.php?module=pages">
          <i class="fas fa-fw fa-file-alt"></i>
          <span>Pages</span></a>
      </li>
      <?php } ?>
      <?php if ($_SESSION['level']=='admin'){ ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-image"></i>
          <span>Libraries</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="media.php?module=posts">Galleries</a>
          <a class="dropdown-item" href="media.php?module=categories">Albums</a>
        </div>
      </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="media.php?module=users">
          <i class="fas fa-fw fa-user"></i>
          <span>Users</span></a>
      </li>
      <?php if ($_SESSION['level']=='admin'){ ?>
      <li class="nav-item">
        <a class="nav-link" href="media.php?module=settings">
          <i class="fas fa-fw fa-cog"></i>
          <span>Settings</span></a>
      </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>
    </ul>