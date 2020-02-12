<?php
// Head Content
include('config/head-content.php');    
// Header Nav Links
include('config/header.php');
?>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <br>
                <span class="fa fa-check text-success fa-3x"></span>
                <span class="fa fa-times text-danger fa-3x"></span>
            </div>
            <div class="col-md-12">
                <br>
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Intallation Step 1 Adding DB Credentials</h4>
                    </div>
                    <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <label for="">Database Name</label>
                            <input type="text" name="db_name" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Database Username</label>
                            <input type="text" name="db_username" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Database User Password</label>
                            <input type="password" name="db_user_password" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Host Name</label>
                            <input type="text" name="db_host_name" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="install" value="Install" class="form-control btn btn-success">
                        </div>
                    </form>
                    </div>
                    <div class="card-footer">
                        <p class="text-danger text-center">Note! After installing the file will git deleted!</p>
                    </div>
                </div>
                <br>
            </div>

            <div class="col-md-12">
                <br>
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Intallation Step 2 Creating Tables</h4>
                    </div>
                    <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <label for="">Database Name</label>
                            <input type="text" name="db_name" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Database Username</label>
                            <input type="text" name="db_username" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Database User Password</label>
                            <input type="password" name="db_user_password" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Host Name</label>
                            <input type="text" name="db_host_name" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="install" value="Install" class="form-control btn btn-success">
                        </div>
                    </form>
                    </div>
                    <div class="card-footer">
                        <p class="text-danger text-center">Note! After installing the file will git deleted!</p>
                    </div>
                </div>
                <br>
            </div>

            <div class="col-md-12">
                <br>
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Intallation Step 3 Adding Admin Details</h4>
                    </div>
                    <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <label for="">Database Name</label>
                            <input type="text" name="db_name" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Database Username</label>
                            <input type="text" name="db_username" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Database User Password</label>
                            <input type="password" name="db_user_password" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Host Name</label>
                            <input type="text" name="db_host_name" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="install" value="Install" class="form-control btn btn-success">
                        </div>
                    </form>
                    </div>
                    <div class="card-footer">
                        <p class="text-danger text-center">Note! After installing the file will git deleted!</p>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>



<?php   
    // Footer
    include('config/footer.php');
?>