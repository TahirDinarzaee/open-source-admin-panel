
<div class="container p0">
    <br>
    <ol class="breadcrumb">
    <li class="active">
        <a href="#">Contact</a>
    </li>     
  </ol>
</div>

<div class="container-fluid">
    <div class="container">
        <?php contact(); ?>
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center text-muted">
                    Aha you got questions fill in the form and submit it and we'll get back to you! 
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?page='.$_GET['content']; ?>" method="POST">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="u_name" placeholder="Enter Here!" class="form-control" minlength="6">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="u_email" placeholder="Enter Here!" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Reason</label>
                                <select name="reason" class="form-control" id="">
                                    <option value="Career">Career</option>
                                    <option value="Complain">Complain</option>
                                    <option value="Feedback">Feedback</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Comment</label>
                                <textarea name="comment" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="contact" value="Contact" placeholder="Enter Here!" class="form-control btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>