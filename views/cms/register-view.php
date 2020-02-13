<div class="container p0">
    <br>
    <ol class="breadcrumb">
    <li class="active">
        <a href="#">Register</a>
    </li>     
  </ol>
</div>





<div class="container-fluid">
    <div class="container">
        <?php register(); ?>
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo $register ?>" method="POST">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="user_name" placeholder="Enter Here!" class="form-control" minlength="6">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="user_email" placeholder="Enter Here!" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="user_password" placeholder="Enter Here!" class="form-control" minlength="6">
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" name="confirm_password" placeholder="Enter Here!" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="register" value="Register" placeholder="Enter Here!" class="form-control btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>