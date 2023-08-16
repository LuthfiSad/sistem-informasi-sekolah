<a href="index.php" class="logo">
  <span class="logo-mini"></span>
  <span class="logo-lg"><b>PWPB</b></span>
</a>
<nav class="navbar navbar-static-top" role="navigation">
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="<?php echo $foto; ?>" class="user-image" alt="User Image">
          <span class="hidden-xs"><?php echo $nama; ?></span> <span class='caret'></span>
        </a>
        <ul class="dropdown-menu">
          <li class="user-header">
            <img src="<?php echo $foto; ?>" class="img-circle" alt="User Image">
            <p>
              <?php echo $nama; ?>
              <small><?php echo $level; ?></small>
            </p>
          </li>
        </ul>
      </li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>