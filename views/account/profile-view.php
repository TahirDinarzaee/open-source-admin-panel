<div class="container p0">
    <br>
    <ol class="breadcrumb">
    <li class="active"><a href="#">Profile</a></li>     
  </ol>
</div>

<div class="container-fluid">
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <?php user_info_edit($_GET['user']);?>
            </div>
        </div>
        <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <?php include('user-nav-links.php') ?>
                </div>
            </div>
        </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-body">
                        <img width="100%" height="100%" class="img-responsive" src="assets/images/user-profile-img.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?content='.$_GET["content"].'&user='.$_GET['user']; ?>" method="POST">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Title</label>
                                <select class="form-control" name="u_title" id="">
                                    <option <?php if($user['u_title'] == 'Mrs')  {echo 'selected';}?> value="Mrs">Mrs</option>
                                    <option <?php if($user['u_title'] == 'Miss')  {echo 'selected';}?> value="Miss">Miss</option>
                                    <option <?php if($user['u_title'] == 'Mr')  {echo 'selected';}?> value="Mr">Mr</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" name="f_name" value="<?php echo $user['f_name']; ?>" placeholder="Enter Here!" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Middle Name</label>
                                <input type="text" name="m_name" value="<?php echo $user['m_name']; ?>" placeholder="Enter Here!" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" name="l_name" value="<?php echo $user['l_name']; ?>" placeholder="Enter Here!" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input  type="email" name="u_email" value="<?php echo $user['u_email']; ?>" placeholder="Enter Here!" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="update_profile" value="Save"class="form-control btn btn-success">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
    </div>
</div>
