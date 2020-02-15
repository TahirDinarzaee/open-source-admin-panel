<div class="container p0">
    <br>
    <ol class="breadcrumb">
    <li class="active">
        <a href="#">Log In History</a>
    </li>     
  </ol>
</div>


<div class="container-fluid">
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <?php log_in_history($_GET['user']); ?>
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
            <div class="col-md-9">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                            Date & Time
                            </th>
                            <th>
                            Location
                            </th>
                            <th>
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                            <?php echo '12/02/2020 18:59:25' ?>
                            </td>
                            <td>
                                <?php echo 'UK/London' ?>
                            </td>
                            <td>
                                <?php echo 'Success' ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
    </div>
</div>
