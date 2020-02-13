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
            <?php user_info_edit($_GET['user']);?>
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
                <form action="" method="POST">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Title</label>
                                <select class="form-control" name="title" id="">
                                    <option value="Mrs">Mrs</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Mr">Mr</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" name="f_name" value="<?php echo $f_name; ?>" placeholder="Enter Here!" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Middle Name</label>
                                <input type="text" name="m_name" value="<?php echo $m_name; ?>" placeholder="Enter Here!" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" name="l_name" value="<?php echo $l_name; ?>" placeholder="Enter Here!" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input disabled type="email" name="user_email" value="<?php echo $u_email; ?>" placeholder="Enter Here!" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="save" value="Save"class="form-control btn btn-success">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
    </div>
</div>
