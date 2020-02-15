<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">OS Admin Panel V1.0</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
    </ul>

    <ul class="nav justify-content-end">
      <?php if (!isset($_SESSION['logged_in'])) {?>
       <li class="nav-item">
        <a class="nav-link" href="<?php echo $base_url?>page/index.php?page=register">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $base_url?>page/index.php?page=login">Log In</a>
      </li>
      <?php } ?>
      <?php if (isset($_SESSION['logged_in'])) {?>
       <li class="nav-item">
        <a class="nav-link" href="<?php echo $base_url?>account/index.php?content=profile&user=<?php echo $_SESSION['user_unique_id']?>">Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $base_url?>page/index.php?page=log-out">Log Out</a>
      </li>
      <?php } ?>
    </ul>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <br>
      <div class="alert alert-info">
        <h4>Header Banner</h4>
      </div>
    </div>
  </div>
</div>