<div class="container p0">
    <br>
    <ol class="breadcrumb">
    <li class="active">
        <a href="#">Change Email</a>
    </li>     
  </ol>
</div>


<div class="container-fluid">
    <div class="container">
        <br>
        <div class="row">
        </div>
        <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <?php include('user-nav-links.php') ?>
                </div>
            </div>
        </div>
            <div class="col-md-9">
                <form action="" method="POST">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Change Email</label>
                                <input  type="email" name="new_email" value="" placeholder="Enter Here!" class="form-control">
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
