<div class="container p0">
    <br>
    <ol class="breadcrumb">
    <li class="active">
        <a href="#">Log In</a>
    </li>     
  </ol>
</div>

<div class="container-fluid">
    <div class="container">
        <?php  log_in(); ?>
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?page='.$_GET["page"]; ?>" method="POST">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="user_email" placeholder="Enter Here!" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="user_password" placeholder="Enter Here!" class="form-control" minlength="6">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="log_in" value="Log In" placeholder="Enter Here!" class="form-control btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>