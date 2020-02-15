
<?php session_check(); ?>

<div class="container p0">
    <br>
    <ol class="breadcrumb">
    <li class="active">
        <a href="#">Logged Out</a>
    </li>     
  </ol>
</div>

<div class="container-fluid">
    <div class="container">
        <?php  log_out(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success text-center">
                    Logged Out!
                </div>
            </div>
        </div>
    </div>
</div>