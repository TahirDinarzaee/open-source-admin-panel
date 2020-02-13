
<?php

// Head Content
include('../config/head-content.php');    
// Header Nav Links
include('../config/header.php');
?>

<?php
if ($_GET['content'] == "profile"){
// Account Views
include('../views/account/profile-view.php');
}
elseif ($_GET['content'] == 'change_password') {
// Account Views
include('../views/account/password-change-view.php');
}
elseif ($_GET['content'] == 'change_email') {
// Account Views
include('../views/account/email-change-view.php');
}
elseif ($_GET['content'] == 'notification_setting') {
// Account Views
include('../views/account/notification-setting-view.php');
}
?>


<?php   
    // Footer
    include('../config/footer.php');
?>