

<footer style="background-color:#ecf0f1;">
    <div class="container-fluid">
        <div class="container">
            <div class="row text-center">
                <!-- CMS Pages  -->
                <div class="col-md-4">
                    <h5>CMS Pages</h5>
                    <ul class="nav flex-column">
                        <?php 
                        // Cms Pages Function
                        cms_pages_urls();
                            
                        ?>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Address</h5>
                    <p style="padding:0px; margin:0px;">123 Street</p>
                    <p style="padding:0px; margin:0px;">City</p>
                    <p style="padding:0px; margin:0px;">Country</p>
                    <p style="padding:0px; margin:0px;">Post Code</p>
                    <p style="padding:0px; margin:0px;">Email</p>
                    <p style="padding:0px; margin:0px;">Phone</p>
                </div>
                <div class="col-md-4">
                    <H5>Social Links</H5>
                    <a href="" target="_blank">
                        <span class="fa fa-twitter"></span>
                    </a>
                    <a href="" target="_blank">
                        <span class="fa fa-instagram"></span>
                    </a>
                    <a href="" target="_blank">
                        <span class="fa fa-linkedin"></span>
                    </a>
                    <a href="" target="_blank">
                        <span class="fa fa-facebook"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>
</html>